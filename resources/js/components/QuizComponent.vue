<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Çevrimiçi Sınav
                        <span class="float-right">{{questionIndex}}/{{questions.length}}</span>
                    </div>
                  
                    <div class="card-body">
                        <div v-for="(question, index) in questions">
                            <div v-show="index===questionIndex">
                            {{question.question}}
                            <ol>
                                <li v-for="choice in question.answers">
                                <label for="">
                                    <input type="radio">
                                    {{choice.answers}}
                                </label>
                                </li>
                            </ol>
                        </div>
                    </div>
                        <button class="btn btn-success"@click="prev()">Önceki</button>
                        <button class="btn btn-success float-right"@click="next()">Sonraki</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['quizid','quizQuestions','hasQuizPlayed','times'],
        data() {
            return {
                questions:this.quizQuestions,
                questionIndex:0,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            prev() {
                this.questionIndex--
            },
            next() {
                this.questionIndex++
            }
        }
    }
</script>
