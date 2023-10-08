<?php

class BaseController{
  function __construct(){
    AuthHelper::verify();
  }
}