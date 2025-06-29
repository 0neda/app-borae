<?php

namespace App\Enum;

enum EnumStatusAprovacao: string
{
    case APROVADO = 'Aprovado';
    case PENDENTE = 'Pendente';
    case REPROVADO = 'Reprovado';
}

// Usage example:
// $status = EnumStatusAprovacao::APROVADO;
// echo $status->value; // Outputs: Aprovado

function getStatusDescription(EnumStatusAprovacao $status): string
{
    return match ($status) {
        EnumStatusAprovacao::APROVADO => 'Sua solicitação foi aceita!',
        EnumStatusAprovacao::PENDENTE => 'Sua solicitação está pendente.',
        EnumStatusAprovacao::REPROVADO => 'Sua solicitação foi rejeitada!',
    };
}
