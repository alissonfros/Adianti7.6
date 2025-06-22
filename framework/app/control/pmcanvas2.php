<?php

use Adianti\Control\TAction;
use Adianti\Control\TPage;
use Adianti\Widget\Container\TNotebook;
use Adianti\Widget\Container\TTable;
use Adianti\Widget\Container\TVBox;
use Adianti\Widget\Form\TCheckGroup;
use Adianti\Widget\Form\TCombo;
use Adianti\Widget\Form\TDate;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TFieldList;
use Adianti\Widget\Form\TLabel;
use Adianti\Widget\Form\TText;
use Adianti\Widget\Util\TXMLBreadCrumb;
use Adianti\Wrapper\BootstrapFormBuilder;
use Adianti\Wrapper\BootstrapNotebookWrapper;

class pmcanvas2 extends TPage

{
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the notebook
        $notebook = new BootstrapNotebookWrapper( new TNotebook() );
        
        // Menu na lateral
        //$notebook->setTabsDirection('left');
        
        // creates the containers for each notebook page
        $page1 = new TTable;
        $page2 = new TTable; //new TLabel('Produto e Requisitos');
        $page3 = new TTable; //new TLabel('Stakeholders e Equipe');
        $page4 = new TLabel('Premissas, Grupo de Entregas e Restrições');
        $page5 = new TLabel('Riscos, Linha do Tempo e Custos');
   



        // adds two pages in the notebook
        $notebook->appendPage('POR QUE', $page1);
        $notebook->appendPage('O QUE', $page2);
        $notebook->appendPage('QUEM', $page3);
        $notebook->appendPage('COMO', $page4);
        $notebook->appendPage('QUANDO E QUANTO', $page5);
     

        
        //Page 1 - POR QUE

        // Linha em branco
        $linha=$page1->addRow();
        $linha->addCell(new TLabel(' '));

         // campo justificativa
        $field1 = new TText('campo_justificativa');
        $field1->setSize(500);      
        // adds a row for a field
        $row1=$page1->addRow();
        $row1->addCell(new TLabel('Justificativas (Passado):'));
        $row1->addCell($field1);

        // Linha em branco
        $linha=$page1->addRow();
        $linha->addCell(new TLabel(' '));

       
         // campo objetivo SMART

        $row2=$page1->addRow();
        $row2->addCell(new TLabel('Objetivo SMART'));

        $field2 = new TEntry('objetivo');
        $field2->setSize(500);
        $row2=$page1->addRow();
        $row2->addCell(new TLabel('Descrição:'));
        $row2->addCell($field2);
              

        $field3 = new TEntry('indicador');
        $field3->setSize(500);  
        $row3=$page1->addRow();
        $row3->addCell(new TLabel('Indicador:'));
        $row3->addCell($field3);

        $field4 = new TCheckGroup('check');
        $itens  = ['S' => ' S - Specific (Específico)', 
                   'M' => ' M - Measurable (Mensurável)', 
                   'A' => ' A - Attainable (Atingível)',
                   'R' => ' R - Relevant (Relevante)',
                   'T' => ' T - Time-bound (Temporal)'
                ];
        $field4->addItems($itens);
        
        $row4=$page1->addRow();
        $row4->addCell(new TLabel('Análise:'));
        $row4->addCell($field4);
        
       
        // Linha em branco
        $linha=$page1->addRow();
        $linha->addCell(new TLabel(' '));

        // campo Beneficios
        $field5 = new TText('campo_beneficios');
        $field5->setSize(500);      
        // adds a row for a field
        $row5=$page1->addRow();
        $row5->addCell(new TLabel('Justificativas (Passado):'));
        $row5->addCell($field5);
    
        
    
        //Page 2 - O QUE

        // Linha em branco
        $linha=$page2->addRow();
        $linha->addCell(new TLabel(' '));

         // campo produto
        $field6 = new TText('campo_produto');
        $field6->setSize(500,70);     

        // adds a row for a field
        $row1=$page2->addRow();
        $row1->addCell(new TLabel('Produto:'));
        $row1->addCell($field6);

        // Linha em branco
        $linha=$page2->addRow();
        $linha->addCell(new TLabel(' '));    
        
         // campo produto
         $field7 = new TText('campo_requisitos');
         $field7->setSize(500,150);     
 
         // adds a row for a field
         $row1=$page2->addRow();
         $row1->addCell(new TLabel('Requisitos:'));
         $row1->addCell($field7);

        
        
        //Page 3 - QUEM

        // Linha em branco
        $linha=$page3->addRow();
        $linha->addCell(new TLabel(' '));
        
        $field8 =  new BootstrapFormBuilder('meu_form');

        $combo = new TCombo('combo[]');//os [] no final do campo indica que é um campo vetorial
        $texto = new TEntry('texto[]');

        $combo->enableSearch(); //faz com que ao datilografar vá aparecendo as opções
        $combo->addItems(['p' => 'Pessoa', 'o' => 'Organização', 'f' => 'Fatores Externos']); //preenche algumas opções no combo
        $combo->setSize('100%');
        $texto->setSize('100%');


       /*  fieldlist => componente de lista de campos, fica ao redor dos campos que adiciona as funcionalidade
        de excluir, adicionar linhas */
        $fieldlist = new TFieldList;
        $fieldlist->width = '100%';
        
       /* O addField recebe 3 parâmetros, nome da coloca, o objeto que vai dentro da célula da linha,
       como terceiro parâmetro (opcional), posso incluir um vetor de propriedades daquela coluna.  */
       $fieldlist->addField('<b>Tipo Stakeholder/b>', $combo, ['width' => '30%']);
       $fieldlist->addField('<b>Descrição</b>', $texto, ['width' => '70%']);


       //Para mover uma linha usamos o método enableSorting:
       //$fieldlist->enableSorting();

       $fieldlist->addHeader();//adiciona o cabeçalho no fieldlist
       $fieldlist->addDetail( new stdClass ); //adiciona uma linha em branco no fieldlist
       $fieldlist->addCloneAction();//cria o botão de clonagem
    
       $field8->addField($combo);
       $field8->addField($texto);

       //com o método addContent vamos inserir o fieldlist dentro do formulário (form):
        //$field8->form->addContent( [$fieldlist] );
        //$field8->form->addAction('Enviar', new TAction([$this, 'onSend']), 'fa:save' );

        
        //parent::add( $page3->form );
 
        
        




        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($notebook);
        parent::add($vbox);
    }
}

?>