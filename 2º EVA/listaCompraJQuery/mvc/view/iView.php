<?php

interface iView {

    public function loadView(string $view);
    public function renderView(string $path);
    public function renderViewKeyword(string $keyword, string $html);
    public function returnView();

}