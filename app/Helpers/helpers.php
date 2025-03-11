<?php
use Illuminate\Support\Facades\Storage;


function leerImagen($base64, $format, $directory)
{

    
    if (!Storage::disk('public')->exists($directory)) {
        Storage::disk('public')->makeDirectory($directory);
    }

    $data = base64_decode($base64);
    $nombre = time() . '.' . $format;
    Storage::disk('public')->put($directory . "/" . $nombre, $data, 'public');

    return "/storage/" . $nombre;

}
