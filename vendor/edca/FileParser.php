<?php

namespace Core;


interface FileParser
{
    function __construct($dataFile);

    function getData();

    function setData($rawData);

    function convertToArray();
}