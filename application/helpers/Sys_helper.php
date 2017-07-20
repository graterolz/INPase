<?php
// Print array result - database
function my_form_dropdown($name, $result_array, $extras){
    $options = array(
        '' => '(None)'
    );

    if($name=='nombre_evento'){
        foreach ($result_array as $key => $value){
            $options[$value['ideve']] = $value['nombre'];
        }
    }elseif ($name=='tipo_entrada') {
        if (count($result_array)>1){
            foreach ($result_array as $key => $value){
                $options[$value['descripcion']] = $value['descripcion'];
            }
        }     
    }    

    return form_dropdown($name, $options, NULL, $extras);
}
?>