<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {

    public function testHeridaLeveVive() {
       
        #Se probará el efecto de una herida leve a una Enana con puntos de vida suficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es mayor que 0 y además que su situación es viva

        //Se le restan 10, asi que deberia de seguir viva
        $enana = new Enana('Bruwngeilda',30,'viva');
        $this->assertEquals('viva',$enana->heridaLeve());

    }

    public function testHeridaLeveMuere() {
       
        #Se probará el efecto de una herida leve a una Enana con puntos de vida insuficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es menor que 0 y además que su situación es muerta

        //Se le restan 10, asi que deberia de estar muerta
        $enana = new Enana('Bruwngeilda',0,'limbo');
        $this->assertEquals('muerta',$enana->heridaLeve());

    }

    public function testHeridaGrave() {
       
        #Se probará el efecto de una herida grave a una Enana con una situación de viva.
        #Se tendrá que probar que la vida es 0 y además que su situación es limbo

        //Se le restan todos los puntos de vida hasta tener 0 y estar en el limbo
        $enana = new Enana('Bruwngeilda',50,'viva');
        $this->assertEquals('limbo',$enana->heridaGrave());

    }
    
    public function testPocimaRevive() {
       
        #Se probará el efecto de administrar una pócima a una Enana muerta pero con una vida mayor que -10 y menor que 0
        #Se tendrá que probar que la vida es mayor que 0 y que su situación ha cambiado a viva

        //Tiene que revivir dado que posee menos de -10 puntos de viva y la pocima gana 10;
        $enana = new Enana('Bruwngeilda',-5,'muerta');
        $this->assertEquals('viva',$enana->pocima());


    }

    public function testPocimaExtraLimbo() {
       
        #Se probará el efecto de administrar una pócima Extra a una Enana en el limbo.
        #Se tendrá que probar que la vida es 50 y la situación ha cambiado a viva.

        //Tiene que revivir dado que esta a 0 puntos y la pocima extra gana 50
        $enana = new Enana('Bruwngeilda',0,'limbo');
        $this->assertEquals('viva',$enana->pocimaExtra());

    }
}


?>