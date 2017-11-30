<?php
ob_start();
?>
                  <div class="col-sm-12 d-flex justify-content-end">
                    <div>
                      <a href="index.php?action=acceptcomment&id=<?=$comment->id()?>&page=<?= $_GET['action']?>">
                        <button class="btn btn-success btn-sm ml-1">
                          <i class="fa fa-check" aria-hidden="true"></i>
                          Accepter
                        </button>
                      </a>
                    </div>
                    <div>
                      <a href="index.php?action=editcomment&id=<?= $comment->id() ?>&postid=<?= $comment->post_id() ?>&page=<?= $_GET['action']?>">
                        <button class="btn btn-primary btn-sm ml-1">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                          Modifier
                        </button>
                      </a>
                    </div>
                    <div>
                      <a href="index.php?action=rejectcomment&id=<?= $comment->id() ?>&page=<?= $_GET['action']?>">
                        <button class="btn btn-warning btn-sm ml-1">
                          <i class="fa fa-times" aria-hidden="true"></i>
                          Rejeter
                        </button>
                      </a>
                    </div>

                    <div>
                      <a href="index.php?action=deletecomment&id=<?= $comment->id() ?>&postid=<?= $comment->post_id() ?>&page=<?= $_GET['action']?>">
                        <button class="btn btn-danger btn-sm ml-1">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                          Supprimer
                        </button>
                      </a>
                    </div>
                  </div>
<?php
$commentOption = ob_get_clean();
?>