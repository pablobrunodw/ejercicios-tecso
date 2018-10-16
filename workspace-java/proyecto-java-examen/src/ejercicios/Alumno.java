package ejercicios;

public class Alumno {
	Persona persona = new Persona();
	int legajo;

	public Alumno() {
		System.out.println("Por favor complete todos los campos");
	}

	public Alumno(Persona persona, int legajo) {
		super();
		this.persona = persona;
		this.legajo = legajo;
	}


	public Persona getPersona() {
		return persona;
	}

	public int getLegajo() {
		return legajo;
	}

	public void setPersona(Persona persona) {
		this.persona = persona;
	}

	public void setLegajo(int legajo) {
		this.legajo = legajo;
	}
	

}
