function validaNumericos(event) {//Validar solo ingreso de numeros
    if(event.charCode >= 48 && event.charCode <= 57){
    return true;
    }
    return false;        
}

function ValidarCedula(){
    console.clear();
    var ci = document.getElementById('num_cedula').value;//Obtener la cedula
    var verificar=ci.length;//Cantidad de digitos
    if (verificar==10) {//Si los digitos son 10
        var digito = new Array(10);//Creacion de array
        var Num_Prov=24//Numero de provicias de ecuador
        var numxcoe=0;//Producto de numero de cedula con el coeficiente 2 o 1
        var suma=0 //Sumar los digitos verificadores
        var residuo=0 //Residuo de la suma d e digitos verificadores 
        var D_v=0 //Digito verificador
        for (let i = 0; i <=9; i++) {
            digito[i]=ci.charAt(i);//Cargar los digitos de la cedula por separado
        }
        /* primeros dos digitos corresponden al codigo de la provincia */
        var provincia = digito[0]+digito[1];
        if (provincia > 1 && provincia <= Num_Prov){
            /* El tercer digito es: menor que 6 (0,1,2,3,4,5) para personas naturales*/ 
            if(digito[2]<=5){
                /*Multiplicar cada dígito de la cédula por su coeficiente, 
                si el resultado es mayor a 10 se suma esos dígitos o se resta 9 del resultado de la multiplicación) */
                for (let j = 0; j <= 8; j++) {
                    var mod=j%2;
                    if(mod==0){mod=2;}//Residuo 0 o 1 y si es 0 cambiar a 2 para multiplicar posteriormente con la cedula
                    //console.log(mod);
                    numxcoe=digito[j]*mod;
                    if (numxcoe>=10) {
                        numxcoe=numxcoe-9;
                    }
                    suma+=numxcoe;
                }
                residuo=suma%10
                if(residuo==0){
                    D_v=0;
                }else{
                    D_v=10-residuo;
                }
                console.log("Suma del producto por coeficiente "+suma);
                console.log("Digito verificador : "+D_v);
                if (D_v==digito[9]) {
                    console.log("Los digitos son iguales");
                }else{
                    console.log("Los digitos NO! son iguales");
                    alert("La cedula ingresada es incorrecta, verificar los numero ingresados");
                }
            }else{
                alert('El tercer dígito ingresado no es correcto, se debe ingresar una cedula de persona natural');
            }
            
        }else{
            alert('El código de la provincia (dos primeros dígitos) es inválido');
        }
    }
    
}