package ejercicios;
import java.util.*;
import java.text.SimpleDateFormat;
import java.text.ParseException;
/**
 * A. Crear una clase Persona con los siguientes campos
 * (con sus respectivos getters, setters y constructor)
 * 
 * TipoDocumento - enum (dni/libretacivica) 
 * NroDocumento - Integer
 * Nombre - String
 * Apellido - String
 * FechaNacimiento - Date
 * 
 * B. En el método main de la clase "Ejercicio2" crear una nueva instancia
 * de la clase persona y settearle valores reales con tus datos
 * 
 * 
 * C. En el método main de la clase "Ejercicio 2" imprimir los valores en 
 * consola 
 * (crear método main e imprimir valores) 
 *  
 * @author examen
 *
 */

public class Ejercicio2 {

	/**
	 * 
	 */
	public Ejercicio2() {
		// TODO Auto-generated constructor stub
	}

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		Date fechaNac = new Date();
		TipoDocumento docType = TipoDocumento.DNI;
		
		SimpleDateFormat dFecha = new SimpleDateFormat("dd-MM-yyyy");
        try {
            fechaNac = dFecha.parse("10-09-1981");
        } catch (ParseException e) {
            e.printStackTrace();
        }
        
		Persona pablo = new Persona(docType,28912953,"Pablo","Bruno",fechaNac);
		
		/* Forma 1 de hacer la impresi�n en consola */
		System.out.println("Documento tipo: "+pablo.getTipoDocumento()+
				"\nN� Documento: "+pablo.getNroDocumento()+
				"\nNombre: "+pablo.getNombre()+
				"\nApellido: "+pablo.getApellido()+
				"\nFecha de Nacimiento: "+dFecha.format(pablo.getFechaNacimiento())+
				"\n=================================================================");
		
		/* Forma 2 de hacer la impresi�n en consola */
		pablo.imprimir();

	}

}
