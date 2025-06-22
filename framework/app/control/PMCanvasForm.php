<?php
class PMCanvasForm extends TPage
{
    protected $form;

    public function __construct()
    {
        parent::__construct();

        $this->form = new BootstrapFormBuilder('form_PMCanvas');
        $this->form->setFormTitle('Cadastro PM Canvas');

        $notebook = new TNotebook;

        // Criação das abas
        $notebook->appendPage('Justificativa', new TText('justificativa'));
        $notebook->appendPage('Objetivo Smart', new TText('objetivo_smart'));
        $notebook->appendPage('Benefícios', new TText('beneficios'));
        $notebook->appendPage('Produto', new TText('produto'));
        $notebook->appendPage('Requisitos', new TText('requisitos'));
        $notebook->appendPage('Stakeholders externos', new TText('stakeholders_externos'));
        $notebook->appendPage('Equipe', new TText('equipe'));
        $notebook->appendPage('Premissas', new TText('premissas'));
        $notebook->appendPage('Riscos', new TText('riscos'));
        $notebook->appendPage('Grupos de Entregas', new TText('grupos_de_entregas'));
        $notebook->appendPage('Restrições', new TText('restricoes'));
        $notebook->appendPage('Linha do Tempo', new TText('linha_do_tempo'));
        $notebook->appendPage('Custos', new TText('custos'));

        $this->form->addFields([$notebook]);

        $this->form->addAction('Salvar', new TAction(array($this, 'onSave')), 'fa:save green');

        parent::add($this->form);
    }

    public function onSave($param)
    {
        try
        {
            TTransaction::open('database');

            $data = $this->form->getData();

            // Salva os dados do formulário no banco de dados

            TTransaction::close();

            new TMessage('info', 'Dados salvos com sucesso!');
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }
}
?>
