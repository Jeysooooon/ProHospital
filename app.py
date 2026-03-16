from flask import Flask, render_template, request, redirect, url_for
import mysql.connector

app = Flask(__name__)

# Configuración de la conexión [cite: 119, 123]
conn = mysql.connector.connect(
    host='localhost',
    user='root',
    password='',
    database='ujcv_2026_1_progra2' 
)

# --- CRUD ESPECIALIDADES ---
@app.route("/especialidades/")
def especialidades_index():
    cur = conn.cursor()
    cur.execute("SELECT * FROM especialidades")
    datos = cur.fetchall()
    cur.close()
    return render_template('especialidades/index.html', lista=datos)

@app.route("/especialidades/agregar", methods=["GET", "POST"])
def agregar_especialidad():
    if request.method == 'POST':
        nombre = request.form['EspNombre']
        cursor = conn.cursor()
        cursor.execute("INSERT INTO especialidades (EspNombre) VALUES (%s)", (nombre,))
        conn.commit()
        return redirect(url_for('especialidades_index'))
    return render_template('especialidades/agregar.html')


# --- CRUD DOCTORES ---
@app.route("/doctores/")
def doctores_index():
    cur = conn.cursor()
    cur.execute("SELECT * FROM doctores")
    datos = cur.fetchall()
    cur.close()
    return render_template('doctores/index.html', lista=datos)

@app.route("/doctores/agregar", methods=["GET", "POST"])
def agregar_doctor():
    if request.method == 'POST':
        nombre = request.form['DocNombre']
        especialidad = request.form['DocEspecialidad']
        cursor = conn.cursor()
        cursor.execute("INSERT INTO doctores (DocNombre, EspCodigo) VALUES (%s, %s)", (nombre, especialidad))
        conn.commit()
        return redirect(url_for('doctores_index'))
    return render_template('doctores/agregar.html')

@app.route("/doctores/editar/<string:codigo>", methods=["GET", "POST"])
def editar_doctor(codigo):
    if request.method == 'GET':
        cur = conn.cursor()
        # Se busca el doctor por su código único [cite: 150]
        cur.execute("SELECT * FROM doctores WHERE DocCodigo = %s", (codigo,))
        doctor = cur.fetchone()
        cur.close()
        return render_template('doctores/editar.html', doctor=doctor)
    
    elif request.method == 'POST':
        nombre = request.form['DocNombre']
        especialidad = request.form['DocEspecialidad']
        cursor = conn.cursor()
        # Se actualizan los datos usando la sentencia UPDATE [cite: 159]
        cursor.execute("""
            UPDATE doctores 
            SET DocNombre = %s, EspCodigo = %s 
            WHERE DocCodigo = %s
        """, (nombre, especialidad, codigo))
        conn.commit()
        return redirect(url_for('doctores_index'))

@app.route("/doctores/eliminar/<string:codigo>", methods=["GET", "POST"])
def eliminar_doctor(codigo):
    if request.method == 'GET':
        cursor = conn.cursor()
        cursor.execute("SELECT * FROM doctores WHERE DocCodigo = %s", (codigo,))
        doctor = cursor.fetchone()
        # Se muestra la vista de confirmación con los datos deshabilitados [cite: 166]
        return render_template('doctores/eliminar.html', doctor=doctor)
    
    elif request.method == 'POST':
        cursor = conn.cursor()
        # Se ejecuta la eliminación física del registro [cite: 169]
        cursor.execute("DELETE FROM doctores WHERE DocCodigo = %s", (codigo,))
        conn.commit()
        return redirect(url_for('doctores_index'))
    
# --- CRUD PACIENTES ---
@app.route("/pacientes/")
def pacientes_index():
    cur = conn.cursor()
    cur.execute("SELECT * FROM pacientes")
    datos = cur.fetchall()
    cur.close()
    return render_template('pacientes/index.html', lista=datos)

if __name__ == "__main__":
    app.run(debug=True)