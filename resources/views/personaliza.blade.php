<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Personalizador 3D Profesional (Tiempo Real)</title>
  <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"></script>

  <style>
    body { font-family: 'Inter', sans-serif; }
    @import url('https://rsms.me/inter/inter.css');

    model-viewer {
      width: 100%;
      height: 100%;
      background-color: #f9fafb;
      border-radius: 1rem;
    }

    .control-panel {
      background-color: white;
      padding: 1.5rem;
      border-radius: 1rem;
      box-shadow: 0 4px 12px -1px rgb(0 0 0 / 0.1);
    }

    .input-label {
      font-weight: 600;
      color: #4b5563;
      display: block;
      margin-bottom: 0.5rem;
      font-size: 0.875rem;
    }

    .radio-label {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.5rem;
      border-radius: 0.5rem;
      border: 1px solid #e5e7eb;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .radio-label:has(input:checked) {
      background-color: #eef2ff;
      border-color: #818cf8;
    }

    #loading-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.85);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      transition: opacity 0.3s ease;
      backdrop-filter: blur(4px);
    }

    .spinner {
      border: 5px solid rgba(0, 0, 0, 0.1);
      width: 50px;
      height: 50px;
      border-radius: 50%;
      border-left-color: #6d28d9;
      animation: spin 1s ease infinite;
    }

    #loading-overlay p {
      margin-top: 1rem;
      font-weight: 600;
      color: #374151;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    #editorCanvasOverlay {
      position: absolute;
      top: 1rem;
      left: 1rem;
      z-index: 50;
      border: 2px solid #d1d5db;
      background-color: white;
      border-radius: 0.5rem;
      width: 256px;
      cursor: move;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
  </style>
</head>

<body class="bg-gray-100 text-gray-800 p-4 md:p-6">
  <div id="loading-overlay" style="display: none;">
    <div class="spinner"></div>
    <p>Cargando diseño...</p>
  </div>

  <main class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-center mb-6 text-gray-700">Personalizador Profesional</h1>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

      <!-- Panel lateral -->
      <div class="lg:col-span-1 control-panel flex flex-col gap-4">
        <div class="input-group">
          <label class="input-label">1. Elige la parte a editar</label>
          <div id="materialSelector" class="flex flex-wrap gap-2"></div>
        </div>

        <div class="input-group">
          <label class="input-label">2. Cambia el color base</label>
          <input type="color" id="colorPicker" value="#ffffff"
            class="w-full h-10 p-1 border-gray-300 rounded-md cursor-pointer">
        </div>

        <div id="design-controls">
          <div class="input-group">
            <label for="imageInput" class="input-label">3. Sube tu diseño (PNG)</label>
            <input type="file" id="imageInput" accept="image/png"
              class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
          </div>

          <div class="input-group">
            <label class="input-label">4. Añade texto</label>
            <div class="flex gap-2">
              <input type="text" id="textInput" placeholder="Escribe algo..."
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500">
              <button id="addTextButton"
                class="bg-indigo-600 text-white rounded-md px-3 text-lg font-bold">+</button>
            </div>
          </div>

          <div class="flex gap-4 mt-auto pt-4">
            <button id="clearButton"
              class="w-full bg-gray-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-gray-600 transition-transform duration-200 hover:scale-105">Limpiar
              Diseño</button>
          </div>
        </div>
      </div>

      <!-- Visor 3D con canvas flotante -->
      <div class="lg:col-span-2 relative h-[600px] w-full">
        <model-viewer id="modelViewer"
          src="/models/taza.glb"
          alt="Taza 3D personalizable"
          ar auto-rotate camera-controls exposure="1"
          shadow-intensity="1" environment-image="neutral"
          class="w-full h-full">
        </model-viewer>

        <canvas id="editorCanvasOverlay" width="1024" height="512"></canvas>
      </div>
    </div>
  </main>

  <script>
    function debounce(func, wait) {
      let timeout;
      return function executedFunction(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func(...args), wait);
      };
    }

    class ProductCustomizer {
      constructor(selectors) {
        this.viewer = document.querySelector(selectors.viewer);
        this.imageInput = document.querySelector(selectors.imageInput);
        this.clearButton = document.querySelector(selectors.clearButton);
        this.colorPicker = document.querySelector(selectors.colorPicker);
        this.textInput = document.querySelector(selectors.textInput);
        this.addTextButton = document.querySelector(selectors.addTextButton);
        this.materialSelectorContainer = document.querySelector(selectors.materialSelector);
        this.loadingOverlay = document.querySelector(selectors.loadingOverlay);
        this.designControls = document.querySelector(selectors.designControls);

        const canvasElement = document.getElementById('editorCanvasOverlay');
        this.fabricCanvas = new fabric.Canvas(canvasElement, { preserveObjectStacking: true });
        canvasElement.style.touchAction = "none"; // Para compatibilidad táctil

        this.materials = {};
        this.selectedMaterialName = null;
        this.debouncedApplyTexture = debounce(this.applyTexture.bind(this), 250);
      }

      init() {
        this.bindEvents();
      }

      bindEvents() {
        this.viewer.addEventListener('load', this.onModelLoad.bind(this));
        this.imageInput.addEventListener('change', this.onImageUpload.bind(this));
        this.addTextButton.addEventListener('click', this.onAddText.bind(this));
        this.colorPicker.addEventListener('input', this.onColorChange.bind(this));
        this.clearButton.addEventListener('click', this.clearCustomization.bind(this));
        this.fabricCanvas.on('object:modified', this.debouncedApplyTexture);
      }

      showLoading(isLoading) {
        this.loadingOverlay.style.display = isLoading ? 'flex' : 'none';
      }

      updateUIForMaterial(materialName) {
        const allowsDesign = materialName === 'Exterior';
        this.designControls.style.display = allowsDesign ? 'block' : 'none';
        if (!allowsDesign) {
          this.fabricCanvas.clear();
        }
      }

      onModelLoad() {
        this.materials = {};
        for (const material of this.viewer.model.materials) {
          this.materials[material.name] = {
            material: material,
            originalTexture: material.pbrMetallicRoughness.baseColorTexture,
            originalColor: [...material.pbrMetallicRoughness.baseColorFactor],
          };
        }
        this.populateMaterialSelector();
      }

      onImageUpload(event) {
        const file = event.target.files[0];
        if (!file) return;

        this.showLoading(true);
        const reader = new FileReader();
        reader.onload = (e) => {
          fabric.Image.fromURL(e.target.result, (img) => {
            img.scaleToWidth(this.fabricCanvas.width / 4);
            this.fabricCanvas.add(img);
            this.fabricCanvas.centerObject(img);
            this.fabricCanvas.setActiveObject(img);
            this.fabricCanvas.renderAll();
            this.showLoading(false);
            this.applyTexture();
          });
        };
        reader.readAsDataURL(file);
        event.target.value = '';
      }

      onAddText() {
        const text = this.textInput.value;
        if (!text) return;
        const fabricText = new fabric.IText(text, {
          fontFamily: 'Arial', fill: '#000000', fontSize: 60
        });
        this.fabricCanvas.add(fabricText);
        this.fabricCanvas.centerObject(fabricText);
        this.fabricCanvas.setActiveObject(fabricText);
        this.applyTexture();
        this.textInput.value = '';
      }

      onColorChange() {
        this.debouncedApplyTexture();
      }

      async applyTexture() {
        if (this.selectedMaterialName !== 'Exterior' || !this.materials.Exterior) return;

        const materialInfo = this.materials.Exterior;

        const tempCanvas = document.createElement('canvas');
        tempCanvas.width = this.fabricCanvas.width;
        tempCanvas.height = this.fabricCanvas.height;
        const tempCtx = tempCanvas.getContext('2d');

        const color = materialInfo.material.pbrMetallicRoughness.baseColorFactor;
        tempCtx.fillStyle = `rgba(${color[0] * 255}, ${color[1] * 255}, ${color[2] * 255}, ${color[3]})`;
        tempCtx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);

        this.fabricCanvas.discardActiveObject();
        this.fabricCanvas.renderAll();

        const fabricDataUrl = this.fabricCanvas.toDataURL({ format: 'png' });

        const fabricImage = new Image();
        fabricImage.onload = async () => {
          tempCtx.drawImage(fabricImage, 0, 0);

          const finalCanvas = document.createElement('canvas');
          finalCanvas.width = tempCanvas.width;
          finalCanvas.height = tempCanvas.height;
          const finalCtx = finalCanvas.getContext('2d');

          finalCtx.translate(finalCanvas.width, finalCanvas.height);
          finalCtx.scale(-1, -1);
          finalCtx.drawImage(tempCanvas, 0, 0);

          const finalTextureUrl = finalCanvas.toDataURL('image/png');
          const texture = await this.viewer.createTexture(finalTextureUrl);
          materialInfo.material.pbrMetallicRoughness.baseColorTexture.setTexture(texture);
        };
        fabricImage.src = fabricDataUrl;
      }

      clearCustomization() {
        this.fabricCanvas.clear();
        this.applyTexture();
      }

      populateMaterialSelector() {
        this.materialSelectorContainer.innerHTML = '';
        let isFirst = true;
        Object.keys(this.materials).forEach(name => {
          const radioId = `mat-${name}`;
          const label = document.createElement('label');
          label.htmlFor = radioId;
          label.className = 'radio-label';
          label.innerHTML = `<input type="radio" name="material" id="${radioId}" value="${name}" class="accent-indigo-600" ${isFirst ? 'checked' : ''}><span class="text-sm font-medium">${name.replace(/_/g, ' ')}</span>`;
          this.materialSelectorContainer.appendChild(label);
          if (isFirst) {
            this.selectedMaterialName = name;
            isFirst = false;
          }
        });

        this.updateUIForMaterial(this.selectedMaterialName);
        const initialMaterialInfo = this.materials[this.selectedMaterialName];
        if (initialMaterialInfo) {
          this.colorPicker.value = this.rgbToHex(initialMaterialInfo.originalColor);
        }

        this.materialSelectorContainer.addEventListener('change', (e) => {
          this.selectedMaterialName = e.target.value;
          const materialInfo = this.materials[this.selectedMaterialName];
          const currentColor = materialInfo ? materialInfo.material.pbrMetallicRoughness.baseColorFactor : this.hexToRgb('#FFFFFF');
          this.colorPicker.value = this.rgbToHex(currentColor);
          this.updateUIForMaterial(this.selectedMaterialName);
        });
      }

      hexToRgb(hex) {
        const r = parseInt(hex.slice(1, 3), 16) / 255;
        const g = parseInt(hex.slice(3, 5), 16) / 255;
        const b = parseInt(hex.slice(5, 7), 16) / 255;
        return [r, g, b, 1];
      }

      rgbToHex(rgb) {
        const r = Math.round(rgb[0] * 255).toString(16).padStart(2, '0');
        const g = Math.round(rgb[1] * 255).toString(16).padStart(2, '0');
        const b = Math.round(rgb[2] * 255).toString(16).padStart(2, '0');
        return `#${r}${g}${b}`;
      }
    }

    document.addEventListener('DOMContentLoaded', () => {
      new ProductCustomizer({
        viewer: '#modelViewer',
        imageInput: '#imageInput',
        clearButton: '#clearButton',
        colorPicker: '#colorPicker',
        textInput: '#textInput',
        addTextButton: '#addTextButton',
        materialSelector: '#materialSelector',
        loadingOverlay: '#loading-overlay',
        designControls: '#design-controls'
      }).init();
    });
  </script>
</body>
</html>
