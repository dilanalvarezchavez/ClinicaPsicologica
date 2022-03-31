<?php

namespace App\Http\Requests\Papers;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaperRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dia' =>  ['required'],

            // 'pregunta_1' =>  ['required'],
            // 'nph_lantus' =>  ['required'],
            // 'rapida_ultra_rap'  =>  ['required'],

            // 'media_mañana' =>  ['required'],
            // 'rapida_ultra_rap_m' =>  ['required'],

            // 'almuerzo' =>  ['required'],
            // 'rapida_ultra_rap_a' =>  ['required'],

            // 'media_tarde' =>  ['required'],
            // 'rapida_ultra_rap_t' =>  ['required'],

            // 'merienda' =>  ['required'],
            // 'rapida_ultra_rap_md' =>  ['required'],
            // 'nph_lantus_md' =>  ['required'],

            // 'dormir' =>  ['required'],
            // 'madrugada' => ['required'],
            'correcion_total' =>  ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'dia' => 'dia',

            'pregunta_1' =>  'pregunta_1',
            'nph_lantus' => 'nph_lantus',
            'rapida_ultra_rap'  => 'rapida_ultra_rap',

            'media_manana' =>   'media_manana',
            'rapida_ultra_rap_m' =>  'rapida_ultra_rap_m',

            'almuerzo' =>  'almuerzo',
            'rapida_ultra_rap_a' =>  'rapida_ultra_rap_a',

            'media_tarde' =>  'media_tarde',
            'rapida_ultra_rap_t' =>  'rapida_ultra_rap_t',

            'merienda' =>  'merienda',
            'rapida_ultra_rap_md' =>  'rapida_ultra_rap_md',
            'nph_lantus_md' =>  'nph_lantus_md',

            'dormir' =>  'dormir',
            'correcion_total' =>  'correcion_total',
            'observaciones' => 'observaciones',

        ];
    }
}
