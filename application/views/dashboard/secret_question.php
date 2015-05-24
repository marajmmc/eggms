<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/dashboard/login.css">


    <div class="row">
        <div class="login_container">
            <h2><?php echo $this->lang->line("SECRET_QUESTION"); ?></h2>
            <form action="<?php echo base_url()?>dashboard/secret_ques_save" class="form-signin" method="post">
                <table>
                    <tbody>
                        <tr>
                            <td class="col2 custom">
                                <label for=""><?php echo $this->lang->line("FISCAL_YEAR");?><font color="#FF0000">&nbsp;*</font></label>
                            </td>
                            <td class="col2 custom">
                                <div class="input text">

                                    <input type="text" name="fiscal_year" id="fiscal_year" readonly="readonly" value="<?php echo $fiscals['fiscal_year'];?>">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="col2 custom">
                                <label for=""><?php echo $this->lang->line("DATE");?><font color="#FF0000">&nbsp;*</font></label>
                            </td>
                            <td class="col2 custom">
                                <div class="input text"><input type="text" class="" id="opening_date" name="opening_date"/></div>
                            </td>
                        </tr>

                        <tr>
                            <td class="custom">
                                <label for=""><?php echo $this->lang->line("CASH_IN_HAND");?> <font color="#FF0000">*</font>
                                </label></td>
                            <td class="custom">
                                <div class="input password"><input type="text" class="" id="cash_in_hand" name="cash_in_hand"/></div>
                            </td>
                        </tr>

                        <tr>
                            <td class="custom">
                                <label for=""><?php echo $this->lang->line("SECRET_QUESTION");?> <font color="#FF0000">*</font>
                                </label></td>
                            <td class="custom">
                                <div class="input password">
                                    <select name="sec_ques" id="sec_ques" class="form-control">
                                        <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                        <?php
                                        foreach($questions as $q){
                                        ?>
                                            <option value="<?php echo $q['question_id']?>"><?php echo $q['question'];?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="custom">
                                <label for=""><?php echo $this->lang->line("SECRET_QUESTION_ANSWER");?> <font color="#FF0000">*</font>
                                </label></td>
                            <td class="custom">
                                <div class="input password"><input type="text" class="" id="sec_ques_ans" name="sec_ques_ans"/></div>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="custom">
                                <input type="submit" value="<?php echo $this->lang->line("SAVE");?>" class="btn btn-success" id="submitLogin" name="submitLogin">
                            </td>
                        </tr>
                    </tbody>
                </table>

            </form>
        </div>

    </div>


<script src="<?php echo base_url()?>js/tasks/secret_question/secret_question.js"></script>

