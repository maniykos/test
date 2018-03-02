<template>
    <!-- Форма добавления коментариев -->
    <form class="form_add_comments" method="post" action="#" v-if="form_message_show">
        <input type="hidden" name="parent_id" v-model="parent_id" value="parent_id"/>
        <div class="head-form-dialog">
            <div class="title">Добавить отзыв или предложение</div>
            <p>Разрешено комментировать только на русском языке. Запрещено использовать мат,
                транслит. </p>
        </div>
        <div>
            <div class="input-lines" v-bind:class="{ 'form-group--error': $v.review.$error }" >
                <label for="form_add_comments">ТЕКСТ</label>
                <textarea type="text" v-model="review"
                       v-on:input="$v.review.$touch"
                       v-bind:class="{error: $v.review.$error, valid: $v.review.$dirty && !$v.review.$invalid}"
                ></textarea>
            </div>
        </div>
        <div class="form-submit">
            <a href="javascript:void(0);" class="form-submit-close" @click="cansel_new_message()">Отмена</a>
            <button type="button" class="btn-green" @click="submit" >добавить</button>
        </div>
    </form>
</template>
<script>
    import { required, minLength, between } from 'vuelidate/lib/validators'

    export default{
        props:['form_message_show', 'parent_id', 'message_btn_active'],
        data () {
            return {
                review: ''
            }
        },
        validations: {
            review: {
                required,
            }
        },
        methods: {

            cansel_new_message: function () {
                this.$emit('hideNewMessage')
            },
            submit: function () {
                if(this.message_btn_active){

                    this.item = {
                        parent_id: this.parent_id,
                        text: this.review
                    }

                    this.$v.review.$touch();
                    if(!this.$v.review.$error){
                        this.$emit('sendNewMessage', this.item);
                        this.cansel_new_message()
                        this.review = '';
                    }

                }else{
                    alert('Повторное сообщение можно отправлять через 10 секунд')
                }
            }

        },
    }
</script>

<style lang="scss">
    .error {
        border-color: red;
        background: #FDD;
    }

    .error:focus {
        outline-color: #F99;
    }

    .valid {
        border-color: #5A5;
        background: #EFE;
    }

    .valid:focus {
        outline-color: #8E8;
    }
</style>