<ul>
<?php 
$comments = $this->getComments();
 
foreach($comments as $comment)
{
    echo "<li> {$comment->fieldName}</li>";
}
?>
</ul>