<?php

class MatrizSWOTForm extends TPage
{
    public function __construct()
    {
        parent::__construct();

        // Criação do formulário
        $form = new TForm('swot_form');
        
        // Criação dos campos do formulário
        $strengths = new TText('strengths');
        $weaknesses = new TText('weaknesses');
        $opportunities = new TText('opportunities');
        $threats = new TText('threats');

        // Adiciona rótulos aos campos
        $form->addField([new TLabel('Forças')], [$strengths]);
        $form->addField([new TLabel('Fraquezas')], [$weaknesses]);
        $form->addField([new TLabel('Oportunidades')], [$opportunities]);
        $form->addField([new TLabel('Ameaças')], [$threats]);

        // Criação do botão de envio do formulário
        $saveButton = new TButton('save');
        $saveButton->setAction(new TAction([$this, 'onSave']), 'Salvar');

        // Adiciona campos e botões ao formulário
        $form->addField([$saveButton]);

        // Adiciona o formulário à página
        $vbox = new TVBox;
        $vbox->add($form);
        parent::add($vbox);
    }

    public function onSave($param)
    {
        // Recupera os dados do formulário
        $strengths = $param['strengths'];
        $weaknesses = $param['weaknesses'];
        $opportunities = $param['opportunities'];
        $threats = $param['threats'];

        // Aqui você pode salvar os dados no banco de dados ou realizar outras operações necessárias

        // Exemplo de mensagem de sucesso
        //new TMessage('info', 'Dados salvos com sucesso!');
    }
}

// Instancia a página e a exibe
$page = new MatrizSWOTForm;
$page->show();
