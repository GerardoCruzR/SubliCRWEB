print("Hello world")

"""
Este es un comentario
"""
# Comentario de una sola línea

# Declaración de variables
nom = "Gerardo"
apP = "Jesus"
npM = "Cruz"

print("Mi nombre es:", nom, apP, npM)  # Se concatenan con ','

# Unión de variables tipo string
nomCompleto = nom + " " + apP + " " + npM
print(nomCompleto)
print("Longitud de la cadena:", len(nomCompleto))

# Operaciones con números
n1 = 5
n2 = 3

suma = n1 + n2
resta = n1 - n2
multiplicacion = n1 * n2
division = n1 / n2

print("La suma es:", suma)
print("La resta es:", resta)
print("La multiplicación es:", multiplicacion)
print("La división es:", division)

# Solicitud de datos al usuario
print("Solicitando datos al usuario")
n1 = input("Solicitando el primer número: ")
n2 = input("Solicitando el segundo número: ")

# Conversión a enteros
n1 = int(n1)
n2 = int(n2)

# Operaciones
print("Suma:", n1 + n2)
print("Resta:", n1 - n2)
print("Multiplicación:", n1 * n2)

#Usando comodines de candenas 
nomCompleto = "Mi nombre es: \n Gerardo \n Jesus \n cruz \ramirez"
print (nomCompleto)
nomCompleto = "\t Mi Nombre es :\t gerardo \t jesus \t cruz \t ramirez"
print(nomCompleto)

#Uso de cadenas usando llaves 
print ("Mi nombre es: {}. Mi edad es: {}".formant ("Gerardo","20"))