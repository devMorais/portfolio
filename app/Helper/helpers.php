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
            $filePatch = "/uploads/" . $fileName;
            return $filePatch;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}
