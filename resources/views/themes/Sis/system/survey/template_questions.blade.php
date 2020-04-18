@if(sizeof($TemplateQuestions_))
     <?php $Items_=1; ?>
     @foreach($TemplateQuestions_ as $Questions_)
     <div id="Questions-{{$Questions_->id}}" data-template="{{$Questions_->idTemplate}}" data-question="{{$Questions_->id}}" class="item-survey brd_"> 
          <div class="items-options float-right">
               <span id="edit-questions" class="icn-options-items"><i class="lni-pencil-alt" data-toggle="tooltip" data-placement="top" title="Editar "></i></span>
               <span id="trash-questions" onclick="TrasQuestionSurvey_({{$Questions_->id}})" class="icn-options-items"><i class="lni-trash" data-toggle="tooltip" data-placement="top" title="Eliminar " ></i></span>
          </div>
          <div id="question-<?php echo $Items_ ?>" class="question-survey">
               <div class="title"><?php echo $Items_ ?>. {{ !empty($Questions_->question_name)? $Questions_->question_name : " { Asignar nombre de la pregunta.} " }}</div>
               <div class="question-body">
                    
               </div>
          </div>
     </div>
     <?php $Items_=$Items_+1; ?>
     @endforeach
@else

@endif