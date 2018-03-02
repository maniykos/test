<template>
    <div class="mw640 guest-book" id="guest_book">
        <div class="mt40">
            <iframe class="game-video" width="640" height="354"
                    src="https://www.youtube-nocookie.com/embed/jIz3BNnQE7M?rel=0"></iframe>
        </div>
        <div class="guest-book-title mt40">
            комментарии <span>({{items.length}})</span>
            <transition name="fade">
                <button class="btn-green fl-right" v-if="btn_new_message" @click="addNewMessage()">
                    добавить комментарий
                </button>
            </transition>
        </div>
        <div class="comments-block">

            <!-- Форма добавления коментариев -->
            <transition name="fade">
                <div class="form_comments_block">
                    <app-new-message
                            :form_message_show="form_message_show"
                            parent_id = '0'
                            :message_btn_active = "message_btn_active"
                            @hideNewMessage = "hideNewMessage"
                            @sendNewMessage = "sendNewMessage"
                    ></app-new-message>
                </div>
            </transition>
            <div class="gamer_comments">
                <div v-for="(item, key) in items" v-if="item.parent_id == 0" class="comment_user" v-bind:class="[ (key > 3 && !btn_show_all) ? 'no_show' : '']">
                    <app-message-answer
                            :msg="item"
                            :message_btn_active = "message_btn_active"
                            @sendNewMessage = "sendNewMessage"
                    ></app-message-answer>
                    <div v-for="item2 in items" v-if="item2.parent_id == item.id" class="comment_user">
                        <app-message-answer
                                :msg="item2"
                                :message_btn_active = "message_btn_active"
                                @sendNewMessage = "sendNewMessage"
                        ></app-message-answer>
                        <div v-for="item3 in items" v-if="item3.parent_id == item2.id" class="comment_user">
                            <app-message-answer
                                    :msg="item3"
                                    :message_btn_active = "message_btn_active"
                                    hide_create_message = "true"
                                    @sendNewMessage = "sendNewMessage"
                            ></app-message-answer>
                        </div>
                    </div>
                </div>
            </div>

            <a href="javascript:void(0);" class="batton-white" v-if="items.length > 3 && !btn_show_all" @click="messageShowAll()">
                ПОКАЗАТЬ ЕЩЕ </a>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data () {
            return {
                btn_show_all: false,
                form_message_show: false,
                btn_new_message: true,
                message_btn_active: true,
                user:
                    {
                        name: 'new_user',
                        ava_url: 'http://fotooboi.xyz/wp-content/uploads/cache/2018/01/minion_hitman_by_borisfomin-d6ddtw2_s/3463048673.jpg',
                    }
                ,
                items: [
                    {
                        id: 1,
                        parent_id: 0,
                        name: 'name',
                        ava_url: 'http://landbar.com/img/system/profile_na.png',
                        text: '',
                        date: '12.01.2014 / 14:26',
                    },

                ],
            }
        },
        methods: {
            messageShowAll: function () {
                this.btn_show_all = true;
            },
            addNewMessage: function () {
                this.form_message_show = true;
            },
            hideNewMessage: function () {
                this.form_message_show = false;
            },
            sendNewMessage: function (item) {

                var self = this,
                    message = {
                        name:       this.user.name,
                        ava_url:    this.user.ava_url,
                        parent_id:  item.parent_id,
                        text:       item.text
                    };

                axios.post("new_comment.php", message)
                .then(function (response) {
                    if(response.data.success){
                        self.getItemsByXml();
                    }else{
                        alert('Ошибка отправки')
                    }
                })
                .catch(e => {
                    this.errors.push(e)
                })

                self.message_btn_active = false;
                setTimeout(function(){
                    self.message_btn_active = true;
                }, 10000);

            },
            getItemsByXml:function () {
                axios.get('get_comments.php')
                    .then(response => {
                        this.items = response.data;
                    });
            }
        },
        created: function () {
            this.getItemsByXml()
        }
    }
</script>

<style lang="scss">
    $var1: #009e30;
    $var2: #ffffff;
    $var3: #00b236;
    $var4: #999999;
    $var5: #cccccc;
    $var6: #111214;
    $var7: #24262a;
    $var8: #1b1d21;
    $var9: #181A1D;
    $var10: #fff600;
    $var11: #666666;
    $var12: #404347;

    body {
        background-color: rgb(17, 18, 20);
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter, .fade-leave-to {
        opacity: 0;
    }

    .mt40 {
        margin-top: 40px;
    }

    .mw640 {
        max-width: 640px;
        margin: 0 auto;
    }

    .btn-green {
        display: block;
        width: 190px;
        height: 34px;
        text-decoration: none;
        width: inherit;
        height: inherit;
        font-size: 14px;
        line-height: 34px;
        background-color: $var1;
        text-align: center;
        color: $var2;
        border: 0;
        cursor: pointer;
        font-family: arial;
        text-transform: none;
        &:hover {
            background-color: $var3;
        }
    }

    .batton-white {
        display: block;
        text-decoration: none;
        width: inherit;
        height: inherit;
        font-size: 22px;
        line-height: inherit;
        background-color: $var7;
        text-align: center;
        color: $var5;
        border: 0;
        cursor: pointer;
        font-family: arial;
        &:hover {
            background-color: $var12;
        }
    }
    .fl-right {
        float: right;
    }
    .guest-book {
        .gamer_comments {
            width: 600px;
            display: inline-block;
            padding-left: 10px;
        }
        .btn-green {
            margin: 13px 10px;
        }

        .guest-book-title {
            color: $var4;
            font-size: 26px;
            line-height: 60px;
            text-transform: uppercase;
            span {
                color: $var5;
            }
            .batton-green {
                width: 190px;
                height: 34px;
                float: right;
                font-size: 14px;
                line-height: 34px;
                margin: 13px 10px;
                text-transform: none;
            }
        }

        .comments-block {
            width: 610px;
            padding-left: 20px;
            padding-top: 29px;
            padding-bottom: 29px;
            background-color: $var6;
            form {
                background-color: $var7;
            }
            div:nth-child(1) {
                margin-top: 0px;
            }
            .batton-white {
                width: 100%;
                line-height: 44px;
                font-size: 12px;
                text-decoration: none;
                &:hover {
                    text-decoration: underline;
                }
            }
            .comment_user {
                width: 100%;
                float: right;
                padding: 10px 0;

                .comment_user {
                    padding-left: 30px;
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                    background-image: url("img/icon-strelka_answer.png");
                    background-repeat: no-repeat;
                    background-position: 0 28px;
                    padding-top: 0;
                    padding-bottom: 0;
                }
                &.last table {
                    border-bottom: none;
                }
            }
        }
    }

    form {
        &.form_add_comments {
            padding-bottom: 17px;
            .form-submit {
                margin-top:20px;
                padding: 0 40px 0 86px;
                background-color: inherit;
                height: 34px;
                .form-submit-close {
                    line-height: 34px;
                    text-decoration: none;
                    &:hover {
                        text-decoration: underline;
                    }
                }
                .btn-green {
                    float: right;
                    margin: 0;
                    width: 150px;
                }
            }
        }

        .head-form-dialog {
            font-size: 18px;
            color: $var5;
            line-height: 18px;
            padding-top: 17px;
            padding-bottom: 14px;
            padding-left: 30px;
            padding-right: 30px;
            text-transform: uppercase;
            p {
                font-size: 12px;
                color: $var4;
                line-height: 18px;
                text-transform: none;
                margin-top: 15px;
                margin-bottom: 0;
            }
            .title {
                padding-top: 10px;
                padding-bottom: 10px;
                border-bottom: 1px solid $var8;
            }
        }


        div.input-lines{
            display: flex;
            margin-bottom: 0;
            padding-left: 30px;
            padding-right: 40px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            label {
                cursor: pointer;
                flex: 1 1 52px;
                font-size: 11px;
                color: $var5;
                line-height: 40px;
                text-transform: uppercase;
            }
            textarea {
                 flex: 1 1 100%;
                 padding: 10px;
                 height: 110px;
                 min-height: 110px;
                 max-height: 110px;
             }

        }
        .form-submit .form-submit-close {
            float: left;
            color: $var4;
            font-size: 12px;
            line-height: 60px;
            text-decoration: underline;
            button {
                float: right;
            }
        }
    }

    .no_show {
        display: none;
        opacity: 0;
    }


</style>
