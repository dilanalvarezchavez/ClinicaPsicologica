import { UserModel } from "../user/user.model";

export interface PaperModel {
    id?: number;
    name?: string;
    // user_id?: number;
    dia?: String;
    ayunas?: String;
    nph_lantus?: String;
    rapida_ultra_rap?: String;
    media_manana?: String;
    rapida_ultra_rap_m?: String;
    almuerzo?: String;
    rapida_ultra_rap_a?: String;
    media_tarde?: String;
    rapida_ultra_rap_t?: String;
    merienda?: String;
    rapida_ultra_rap_md?: String;
    nph_lantus_md?: String;
    dormir?: String;
    correcion_total?: String;
    observaciones?: String;

}
