<?php

switch($comment){
              case $comment->alert() != 0:
                $status='<span class="badge badge-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Signalement : '.$comment->alert().'</span>';
                break;
              case $comment->stand_by() != 0:
                $status='<span class="badge badge-info"><i class="fa fa-info-circle" aria-hidden="true"></i> En attente </span>';
                break;
              case $comment->published() != 0:
                $status='<span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Publié </span>';
                break;
              case $comment->rejected() != 0:
                $status='<span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i> Rejeté</span>';
                break;

              default :
                $status='';
            }