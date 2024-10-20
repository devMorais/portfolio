<?php

/** Handle file upload */

function handleUpload($inputName, $model = null)
{
    try {
        if (request()->hasFile($inputName)) {
            if ($model && \File::exists(public_path($model->{$inputName}))) {
                \File::delete(public_path($model->{$inputName}));
            }

            $file = request()->file($inputName);
            $fileName = rand() . $file->getClientOriginalName();
            $file->move(public_path('/uploads'), $fileName);

            $filePath = "/uploads/" . $fileName;

            return $filePath;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}


/** Delete file */

function deleteFileIfExist($filePath)
{
    try {
        if (\File::exists(public_path($filePath))) {
            \File::delete(public_path($filePath));
        }
    } catch (\Exception $e) {
        throw $e;
    }
}

/** get dynamic colors  */

function getColor($index)
{
    // $colors = ['#558bff', '#fecc90', '#ff885e', '#282828', '#190844', '#9dd3ff'];
    $colors = [
        '#f75639', // Cor base 1
        '#0c3a68', // Cor base 2
        '#ffcc00', // Amarelo vibrante (contraste com o vermelho)
        '#005b96', // Azul escuro (contraste com o azul)
        '#ff8c00', // Laranja (contraste com o vermelho)
        '#a3d0e1'  // Azul claro (contraste suave com o azul escuro)
    ];

    return $colors[$index % count($colors)];
}

/** Set Sidebar Active  */

function setSidebarActive($route)
{
    if (is_array($route)) {
        foreach ($route as $r) {
            if (request()->routeIs($r)) {
                return 'active';
            }
        }
    }
}
