<?php
namespace NotaFiscalSP\Builders\AsyncNF;

use NotaFiscalSP\Constants\Methods\NfAsyncMethods;
use NotaFiscalSP\Constants\Requests\HeaderEnum;
use NotaFiscalSP\Constants\Requests\SimpleFieldsEnum;
use NotaFiscalSP\Entities\BaseInformation;
use NotaFiscalSP\Helpers\General;
use NotaFiscalSP\Helpers\Xml;
use NotaFiscalSP\Builders\NfAbstract;

class  PedidoConsultaSituacaoGuia extends NfAbstract
{
    public function makeXmlRequest(BaseInformation $information, $params = null)
    {
        $request = [];
        $request[HeaderEnum::CPFCNPJ_SENDER] = [SimpleFieldsEnum::CNPJ => $information->getCnpj()];
        $request[SimpleFieldsEnum::PROTOCOL_NUMBER] = General::getKey($params, SimpleFieldsEnum::PROTOCOL_NUMBER);

        return Xml::makeRequestXML(NfAsyncMethods::CONSULTA_SITUACAO_GUIA, $request);
    }
}