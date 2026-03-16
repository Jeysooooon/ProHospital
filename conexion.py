import os
from dotenv import load_dotenv
from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker

# 1. Cargar las variables del archivo .env al entorno de ejecución
load_dotenv()

# 2. Leer las variables desde el entorno
user = os.getenv("DB_USER")
password = os.getenv("DB_PASSWORD")
host = os.getenv("DB_HOST")
port = os.getenv("DB_PORT")
db_name = os.getenv("DB_NAME")

# 3. Construir la URL de conexión (SQLAlchemy requiere este formato específico)
# La sintaxis es: mysql+pymysql://usuario:contraseña@host:puerto/nombre_base_datos
DATABASE_URL = f"mysql+pymysql://{user}:{password}@{host}:{port}/{db_name}"

# 4. Crear el "Motor" (Engine) que gestionará las conexiones
engine = create_engine(DATABASE_URL)

# 5. Configurar la "Sesión" (Session) para interactuar con los datos
SessionLocal = sessionmaker(autocommit=False, autoflush=False, bind=engine)

def get_db():
    """Esta función nos servirá para abrir una conexión cuando la necesitemos."""
    db = SessionLocal()
    try:
        return db
    finally:
        db.close()