const btn = document.getElementById('menu-btn')
const nav = document.getElementById('menu')

btn.addEventListener('click', () => {
  btn.classList.toggle('open')
  nav.classList.toggle('flex')
  nav.classList.toggle('hidden')
})

// import {
//   Dropdown,
//   Ripple,
//   initTE,
// } from "tw-elements";

// initTE({ Dropdown, Ripple });


    // const appData = () => {
    //     return {
    //         percent: 0,

    //         appInit() {
    //             // source: https://codepen.io/A_kamel/pen/qBmmGKJ
    //             window.addEventListener('scroll', () => {
    //                 let winScroll = document.body.scrollTop || document.documentElement.scrollTop,
    //                     height = document.documentElement.scrollHeight - document.documentElement.clientHeight;

    //                 this.percent = Math.round((winScroll / height) * 100);
    //             });
    //         },
    //     };
    // };
