//intento de almacenar datos
function ojo(My_Form) {
    for (let i = 0; i < My_Form.elements.length; i++) {
        let elemento = My_Form.elements[i];
        
        if (elemento.type !== "button" && elemento.type !== "submit") {
            ArrayData.push({
                i: elemento.name,
                value: elemento.value
            });
        }
    }
    console.log(ArrayData);
}