<?php
class testController extends BaseController {
    public function uploadFile()
    {
        
        $destinationPath = public_path();
        $destinationPath = $destinationPath . '/uploadImage';       
        Log::info($destinationPath);
        
        if (!File::exists($destinationPath))
        {
            File::makeDirectory($destinationPath);
        }

        if (Input::hasFile('dogImage'))
        {
            if (Input::file('dogImage')->isValid())
            {
                $name = Input::file('dogImage')->getClientOriginalName();
                Input::file('dogImage')->move($destinationPath, $name);
            }
        }
        
        return Redirect::to('listProducts');
        
    }
}
?>