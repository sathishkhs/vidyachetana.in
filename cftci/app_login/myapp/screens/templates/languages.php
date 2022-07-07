<?php $languages = $_SESSION['languages']; ?>
<div class="form-actions languagepanel">
    <?php foreach ($languages as $language): ?>
        <div class="span2">
            <input type="checkbox" class="ace-checkbox-2" id="language-<?php echo $language->lang_id; ?>" name="languages[]" value="<?php echo $language->lang_id; ?>" <?php echo ($language->lang_id==$this->session->userdata('lang_id')) ? 'checked' : ''; ?>>
            <label class="lbl" for="language-<?php echo $language->lang_id; ?>"> <?php echo $language->lang_name; ?></label>
        </div>
    <?php endforeach ?> 
</div>
