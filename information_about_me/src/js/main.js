svg4everybody();
$(document).foundation();
// @include('detect.js')
// @include('globals.js')


/**
 *  Class level_js v1.01
 *  @author: Lezhnev (lezhnevod@gmail.com)
 *
 * setlevel --------------------------------------------------------------
 *
 *
 */
var level_js = new Vue({
    el: '#my_level_js',
    data: {
        level: 0,
        speedTimeout:1,
        newlevel: 0,
        maxlevel: 1000,
        minlevel: 0,
        levelRotate: -90,
        minRotate: -90,
        maxRotate: 90,
        levelStyleRotateImg: {
            transform: 'rotate(-90deg)'
        },
        errors: {
            vvod: false,
        },
        result: ''
    },
    methods: {
        setlevel: function (item) {
            var newLevel = parseInt(item);
            if (newLevel <= this.maxlevel && newLevel >= this.minlevel) {
                this.newLevel = newLevel;
                if(this.level <= this.newLevel){
                    this.uplevel();
                }else{
                    this.downlevel();
                }
            } else {
                return false;
            }
        },
        uplevel: function () {
            if (this.level >= this.newLevel || this.level >= this.maxlevel) {
                return false;
            }
            this.level++;
            this.setStyleRotateByImg();
            setTimeout(this.uplevel, this.speedTimeout);
        },
        downlevel: function () {
            if (this.level <= this.newLevel || this.level <= this.minlevel) {
                return false;
            }
            this.level--;
            this.setStyleRotateByImg();
            setTimeout(this.downlevel, this.speedTimeout);
        },

        setStyleRotateByImg: function () {
            var angle = ((this.level / this.maxlevel) * 180) - 90;
            this.levelStyleRotateImg['transform'] = 'rotate('+angle+'deg)';
        }
    },
})

$( document ).ready(function() {
    level_js.setlevel(400);
});

