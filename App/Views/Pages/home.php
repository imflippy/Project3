

<div class="categories">
    <select id="ddlCategories" class="ddlCategories">
        <option value="0">Select Category</option>
        <?php
            foreach ($data['category'] as $c):
        ?>
        <option value="<?= $c->id_category ?>"><?= $c->category ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="textarea">
<!--    <div class="title">-->
<!--        Enter comment on selected category..-->
<!--    </div>-->
    <textarea id="comment" placeholder="Enter comment on selected category.."></textarea>
    <input type="hidden" id="hiddenId" value="0">
    <button id="btnComment">
        Submit Comment
    </button>
</div>
<div id="allComms">

</div>

<div class="popup no-display ">
<textarea id="comment2" placeholder="Enter your replay">
</textarea>
    <input type="hidden" id="hiddenId2" value="0">
    <button id="btnComment2">
        Submit Comment
    </button>
    <button class="cancel">Cancel</button>
</div>

