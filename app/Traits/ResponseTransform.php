<?php

namespace App\Traits;


  use League\Fractal\TransformerAbstract;

  trait ResponseTransform {
      protected  function setTransform (TransformerAbstract $transfomer) {
          $this->transfomer = $transfomer;
      }
  }
