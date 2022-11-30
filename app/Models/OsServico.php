<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OsServico extends Model
{
    use HasFactory;

    protected $table = "os_servico";
    protected $primaryKey = "id_os_servico";

    protected $visible = [
        "id_os_servico",
        "qtd",
        "valorTotal",
        "descricaoInformada",
        "dataHora",
        "id_os_equipamento_item",
        "id_servico",
        "id_usuario"
    ];

    protected $casts = [
        "dataHora" => "datetime"
    ];

    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class, "id_servico", "id_servico");
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, "id_usuario", "id_usuario");
    }
}
