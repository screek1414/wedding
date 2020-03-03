<template>
    <div id="main">
        <div class="col-12 d-inline-flex">
            <div id="photo" class="col-7">
                <div id="main_photo" :style="'background-image: url(' + photo_link_1 + ')'"></div>
                <div id="sub_photo" :style="'background-image: url(' + photo_link_2 + ')'"></div>
            </div>
            <div id="form" class="col-5">
                <div id="title">
                    <span>Запишись на примерку</span><br> <span class="padding">платья у нас!</span>
                </div>
                <el-alert
                    v-if='error'
                    title="Неправильно введены данные"
                    type="error"
                    effect="dark"
                    :closable="false"
                ></el-alert>
                <el-alert
                    v-if='success'
                    title="Заявка успешно отправленна"
                    type="success"
                    effect="dark"
                    :closable="false"
                ></el-alert>
                <el-input
                    :value='model.name'
                    v-model='model.name'
                    placeholder="Иванов Иван Иванович"
                    style="width: 100%; padding: 10px 0;"
                >
                </el-input>
                <el-select
                    v-model='model.place'
                    placeholder="Выберете место"
                    style="width: 100%; padding: 10px 0;"
                >
                    <el-option v-for="(value, index) in place"
                               :key="index"
                               :value="value"
                               :label="value"
                    ></el-option>
                </el-select>
                <el-select
                    v-model="model.time"
                    placeholder="Выберете время"
                    style="width: 100%; padding: 10px 0;"
                >
                    <el-option v-for="(value, index) in time"
                               :key="index"
                               :value="value"
                               :label="value"
                    ></el-option>
                </el-select>
                <div class="block">
                    <el-date-picker
                        v-model="model.date"
                        type="date"
                        placeholder="Выберете день"
                        value-format="yyyy-MM-dd"
                        style="width: 100%; padding: 10px 0;"
                    ></el-date-picker>
                </div>
                <el-input
                    v-model="model.phone"
                    :value="model.phone"
                    v-mask="'+7 (999) 999-99-99'"
                    placeholder="+7 (___) ___-__-__"
                    style="width: 100%; padding: 10px 0;"
                ></el-input>
                <el-input
                    v-model='model.email'
                    :value='model.email'
                    placeholder="example@mail.com"
                    style="width: 100%; padding: 10px 0;"
                ></el-input>
                <button type="button" class="btn btn-info w-100" @click="store"> Оствить заявку</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MainPageComponent",
        data() {
            return {
                model: {
                    name: null,
                    place: null,
                    time: null,
                    phone: null,
                    email: null,
                    date: null,
                },
                place: null,
                time: null,
                error: null,
                success: null,
                photo_link_1: 'https://piondress.ru/wp-content/uploads/2019/10/IMG_6108.jpg',
                photo_link_2: 'https://piondress.ru/wp-content/uploads/2019/11/IMG_8551.jpg',
            }
        },
        created() {
            this.init()
        },
        methods: {
            init() {
                window.axios.get('orders/create')
                    .then(response => {
                        this.place = response.data.place;
                        this.time = response.data.time;
                    })
            },
            store() {
                this.error = false;
                window.axios.post('orders/store', this.model)
                    .then(response => {
                        this.success = true;
                        this.model.name = null;
                        this.model.place = null;
                        this.model.time = null;
                        this.model.phone = null;
                        this.model.email = null;
                        this.model.date = null;
                    })
                    .catch(e => {
                        this.error = 'Данные введены не верно удостоверьтесь в правильности введенной информации';
                    });

            }

        }
    }
</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css?family=Marck+Script&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Gochi+Hand&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Pacifico&display=swap');


    * {
        box-sizing: border-box;
    }

    .input-group-text {
        width: 170px;
    }

    #photo {
        display: flex;
    }

    #main_photo {
        width: 65%;
        height: 95vh;
        background-size: cover;
        background-position: center;
        box-shadow: 0 0 20px #1b1e21;
    }

    #sub_photo {
        position: absolute;
        top: 30%;
        left: 50%;
        width: 300px;
        height: 450px;
        background-size: cover;
        background-position: center;
        box-shadow: 0 0 20px #1b1e21;

    }

    #form {
        position: absolute;
        top: 40%;
        right: 5%;
        background-color: rgba(191, 63, 191, 0.3);
        border: 1px solid black;
        border-radius: 10px;
        box-shadow: 0 0 10px black;
        padding: 30px;
    }

    #title {
        padding: 10px;
        position: absolute;
        top: -70%;
        left: -20%;
        font-size: 4em;
        font-style: italic;
        font-family: 'Pacifico', '', sans-serif;

    }

    .padding {
        margin-left: 350px;
    }
</style>
