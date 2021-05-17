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
                                <label>
                                    <input type="radio" 
                                    :value="choice.is_correct==true?true:choice.answer"
                                    :name="index"
                                    v-model="userResponses[index]"
                                    @click="choices(question.id, choice.id)"
                                    >
                                    {{choice.answer}}
                                    
                                </label>
                                </li>
                            </ol>
                        </div>
                    </div>
                   
                    <div v-show="questionIndex!=questions.length">
                        <button class="btn btn-success"@click="prev()">Önceki</button>
                        <button class="btn btn-success float-right"@click="next(); postuserChoice()">Sonraki</button>
                    </div>
                    <div v-show="questionIndex===questions.length">
                        <p>
                            <center>
                                Sınavı Tamamladın: {{score()}}/{{questions.length}}
                            </center>
                        </p>
                    </div>

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
                userResponses:Array(this.quizQuestions.lenth).fill(false),
                currentQuestion:0,
                currentAnswer:0
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
            },
            choices(question, answer) {
                this.currentAnswer = answer,
                this.currentQuestion = question
            },
            score() {
                return this.userResponses.filter((val) => {
                    return val===true;
                }).length
            },
            postuserChoice()
            {
                axios.post('/quiz/create', {
                    answerId:this.currentAnswer,
                    questionId:this.currentQuestion,
                    quizId:this.quizid
                }).then((response)=>{
                    console.log(response)
                }).catch((error)=>{
                    alert("Error!")
                });
            }
        }
    }
</script>
