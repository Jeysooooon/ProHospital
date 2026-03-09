from sqlalchemy.orm import declarative_base
from sqlalchemy import Column, Integer, String, ForeignKey
from sqlalchemy.orm import relationship

Base = declarative_base()

class Doctor(Base):
    __tablename__ = 'Doctores'
    id = Column(Integer, primary_key=True)
    nombre = Column(String(100))

class Paciente(Base):
    __tablename__ = 'Pacientes'
    id = Column(Integer, primary_key=True)
    nombre = Column(String(100))