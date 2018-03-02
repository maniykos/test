<template>
    <div>
        <div class="comment-bl">
            <div class="left-bl">
                <a href="#" class="ava-img">
                    <img width="44" height="44" alt="img" v-bind:src="msg.ava_url" >
                </a>
            </div>
            <div class="right-bl">
                <a href="#" class="user-name">{{msg.name}}</a>
                <p class="user-title">
                    {{msg.text}}
                </p>
                <div class="user-date">
                    <a href="javascript:void(0);" class="answer" @click="add_new_message()" v-if="!hide_create_message">Ответить</a>
                    <div class="date-block">{{msg.date}}</div>
                </div>
            </div>
        </div>
        <app-new-message
                :form_message_show = "form_message_show"
                :parent_id = msg.id
                @hideNewMessage = "hideNewMessage"
                @sendNewMessage = "sendNewMessage"
                :message_btn_active="message_btn_active"
        ></app-new-message>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                form_message_show: false,
            }
        },
        props:['msg','hide_create_message', 'message_btn_active'],
        methods: {
            add_new_message: function () {
                this.form_message_show = true;
            },
            hideNewMessage: function () {
                this.form_message_show = false;
            },
            sendNewMessage: function (item) {
                this.$emit('sendNewMessage', item) == 2;
            },
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

    .comment-bl {
        width: 100%;
        border-bottom: 1px solid $var9;
        padding-bottom: 10px;
        padding-top: 10px;
        display: flex;
        .left-bl {
            flex: 1 1 69px;
            width: 69px;
        }
        .right-bl {
            flex: 1 1 100%;
            margin-left: 20px;
        }
        .user-date {
            width: 100%;
            .answer {
                font-size: 12px;
                color: $var10;
                line-height: 14px;
                float: left;
                display: block;
            }
            .date-block {
                font-size: 11px;
                color: $var11;
                line-height: 14px;
                float: right;
                display: block;
                span {
                    color: $var5;
                }
            }
        }
        .ava-img {
            float: left;
            width: 44px;
            height: 44px;
            padding: 5px;
            background-color: $var7;
            vertical-align: top;
        }
        .user-name {
            font-size: 14px;
            font-weight: bold;
            color: $var2;
            line-height: 20px;
            display: block;
            width: 100%;
            text-decoration: none;
        }
        p.user-title {
            font-size: 12px;
            color: $var4;
            line-height: 14px;
            display: block;
            width: 100%;
            margin: 0;
            padding-top: 4px;
            padding-bottom: 4px;
        }
    }

</style>