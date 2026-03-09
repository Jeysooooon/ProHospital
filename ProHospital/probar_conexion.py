from conexion import engine

try:
    # Intentamos conectar
    connection = engine.connect()
    print("¡Conexión exitosa a Railway!")
    connection.close()
except Exception as e:
    print(f"Error al conectar: {e}")