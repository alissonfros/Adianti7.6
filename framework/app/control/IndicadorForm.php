<?php

class IndicadorForm extends TPage
{
    public function __construct()
    {
        parent::__construct();

        // Define o título do formulário
        $this->setFormTitle('Cadastro de Indicador');

        // Cria um painel para os campos do formulário
        $panel = new TPanel;
        $panel->setLegend('Dados do Indicador');

        // Campo "Nome do Indicador"
        $nomeIndicador = new TText('nome_indicador');
        $nomeIndicador->setSize(200);
        $nomeIndicador->setMaxLength(200);
        $nomeIndicador->addValidation('Nome do Indicador', new TRequiredValidator);
        $nomeIndicador->setLabel('Nome do Indicador');
        $panel->add($nomeIndicador);

        // Campo "Fórmula"
        $formula = new TText('formula');
        $formula->setSize(200);
        $formula->setMaxLength(200);
        $formula->addValidation('Fórmula', new TRequiredValidator);
        $formula->setLabel('Fórmula');
        $panel->add($formula);

        // Campo "Tipo de Indicador"
        $tipoIndicador = new TCombo('tipo_indicador');
        $tipoIndicador->addItems(['Estratégico', 'Tático', 'Operacional']);
        $tipoIndicador->addValidation('Tipo de Indicador', new TRequiredValidator);
        $tipoIndicador->setLabel('Tipo de Indicador');
        $panel->add($tipoIndicador);

        // Campo "Periodicidade"
        $periodicidade = new TCombo('periodicidade');
        $periodicidade->addItems(['Mensal', 'Trimestral', 'Semestral', 'Anual']);
        $periodicidade->addValidation('Periodicidade', new TRequiredValidator);
        $periodicidade->setLabel('Periodicidade');
        $panel->add($periodicidade);

        // Campo "Meta"
        $meta = new TText('meta');
        $meta->setSize(5);
        $meta->setMaxLength(5);
        $meta->addValidation('Meta', new TRequiredValidator);
        $meta->setLabel('Meta');
        $panel->add($meta);

        // Campo "Tendência"
        $tendencia = new TCombo('tendencia');
        $tendencia->addItems(['Para cima', 'Para baixo']);
        $tendencia->addValidation('Tendência', new TRequiredValidator);
        $tendencia->setLabel('Tendência');
        $panel->add($tendencia);

        // Botão "Salvar"
        $salvar = new TButton('salvar');
        $salvar->setAction(new TAction([$this, 'onSave']), 'Salvar');
        $panel->add($salvar);

        // Adiciona o painel ao formulário
        $this->add($panel);

        // Define o layout do formulário
        $this->setLayout(new TGridLayout);

        // Validação do formulário
        $this->setValidator(new TFormValidator);
    }

    public function onSave()
    {
        try {
            // Salva os dados do formulário
            $data = $this->getData();

            // Valida os dados do formulário
            $this->validateForm();

            // Salva os dados no banco de dados
            // ...

            // Exibe mensagem de sucesso
            new TMessage('info', 'Indicador salvo com sucesso!');

            // Redireciona para a página de listagem
            TApplication::loadPage('IndicadorList');
        } catch (Exception $e) {
            // Exibe mensagem de erro
            new TMessage('error', $e->getMessage());
        }
    }
}