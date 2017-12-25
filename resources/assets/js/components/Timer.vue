<template>
        <div class="col s12 m4 l3">
            <div class="card">
                <div class="card-image">
                    <div style="backround-color:black;"></div>
                     <img src="imgs/fire_elemental.jpg">
                    <span class="card-title">{{ name }}</span>
                </div>
                <div class="card-content" style="padding:0px;">
                    <p style="
    text-align: center;
    margin-top: 10px;
    font-size: 12px;
    color: #da7a78;
">Ends in</p>
                    <p style="text-align:center;font-size:32px;color:#b1120e;margin-bottom:10px;">15:30</p>
                    <ul class="collection" style="margin-top:0px;">
                    <li class="collection-item"><span style="float:right;">[&BLAAAAA=]</span><img style="height:24px;width:24px;vertical-align:middle" src="/imgs/waypoint.png"/> <a href="#">Metrica Province</a></li>
                    <li class="collection-item">s<span class="badge">Auric Basin</span></li>
                    </ul>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        name: 'timer',
        props: {
            name: {
                type: String
            }
        },
        data() {
            return {

            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
