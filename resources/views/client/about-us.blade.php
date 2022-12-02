@php
    $title = 'About Us';
@endphp
@extends('client.layout.master-layout')

@section('css')
    {{-- <script src="{{ asset('asset/js/popper.js') }}"></script> --}}
@stop

@section('content')
    <div id="teamMember" class="fixed-bottom" style="transform: translateY(-240%);max-width: 6em;"><a class="nav-link"
            href="#scrollspymember1"><img class="img-fluid rounded-circle shadow p-2 mt-n3"
                src="{{ asset('asset/teammember/125522392_188243142854240_324351288722931659_n.jpg') }}"
                style="width:4em; height:4em;" data-bs-toggle="tooltip" data-bs-placement="right"
                data-bs-title="Lee Ji-Eun"></a>
        <a class="nav-link" href="#scrollspymember2"><img class="img-fluid rounded-circle shadow p-2 mt-n3"
                src="{{ asset('asset/teammember/img-163031608501861844bd53cb1ba6a85dd469a438ba8a1.jpg') }}"
                style="width:4em; height:4em;" data-bs-toggle="tooltip" data-bs-placement="right"
                data-bs-title="Zhao Li Ying" /></a>
    </div>
    <div class="container py-4" id="scrollspymember1" data-bs-target="#teamMember">
        <header class="mb-3">
            <h2 class="text-uppercase lined mb-4">Lee Ji-Eun</h2>
            <p class="lead">Lee Ji-eun (Korean: 이지은; born May 16, 1993), also known by her stage name IU (Korean: 아이유), is
                a
                South Korean singer-songwriter, record producer and actress. She signed with LOEN Entertainment (now
                Kakao Entertainment) in 2007 as a trainee and debuted as a singer at the age of fifteen with her
                first extended play (EP) Lost and Found (2008).</p>
        </header>
        <div class="row gy-4 mb-2">
            <div class="col-lg-8 col-md-6">
                <div class="text-muted text-sm">
                    <p> Although her follow-up albums, Growing Up and
                        IU...IM, brought mainstream success, it was only after the release of "Good Day" (Korean: 좋은 날), the
                        lead single from her 2010 album Real, that she achieved national stardom. "Good Day" went on to
                        spend five consecutive weeks at the top of South Korea's Gaon Digital Chart, and in 2019, it was
                        ranked number one on Billboard's "100 Greatest K-Pop Songs of the 2010s" list.
                        With the success of her 2011 albums, Real+ and Last Fantasy, IU established herself as a formidable
                        force on the music charts of her native country and further cemented her girl next door image as
                        Korea's "little sister". 2011 also saw her first foray into songwriting with "Hold My Hand",
                        which was written for the television series The Greatest Love. IU's third studio album, Modern Times
                        (2013), showcased a more mature musical style that marked a departure from her earlier girlish
                        image, with several tracks reaching the top 10 on the Gaon Digital Chart. The album was ranked
                        number two on Billboard's "25 Greatest K-Pop Albums of the 2010s" list. IU subsequently exerted
                        more creative control over her music; Chat-Shire marked the first time she was credited as the sole
                        lyricist of her own album.
                        Aside from her music career, IU has ventured into acting and hosting radio and television shows.
                        Following her supporting role in teen drama Dream High (2011) and minor appearances in several
                        television series, she was cast in leading roles in television drama series You Are the Best!
                        (2013), Pretty Man (2013–14), The Producers (2015) and Moon Lovers: Scarlet Heart Ryeo (2016). In
                        2019, she starred
                        in anthology film series Persona and fantasy television series Hotel del Luna, the latter of which
                        led to her second Best Actress nomination at the Baeksang Arts Awards. In 2022, IU starred in
                        Hirokazu Kore-eda's film Broker alongside Song Kang-ho, Bae Doona and Gang Dong-won. She is set to
                        star in Lee Byeong-heon's upcoming film Dream.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6"><img class="img-fluid rounded-circle shadow p-2 mt-n3"
                    src="{{ asset('asset/teammember/125522392_188243142854240_324351288722931659_n.jpg') }}"
                    alt="team member 1"></div>
        </div>
        <div class="row">
            <h3 class="text-uppercase lined mb-4">Reward</h3>
            <ul class="list-unstyled">
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0"> IU's fourth studio album, Palette (2017), became her first to reach number one
                        on Billboard's World Albums chart. While her following records Love Poem and Lilac continued to
                        deviate from mainstream K-pop styles, exploring and mixing various music genres, IU consistently
                        retained her dominance on South Korean music charts.</p>
                </li>
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0"> Her 2020 single "Eight"
                        became her first to reach number one on the Billboard World Digital Song Sales chart.</p>
                </li>
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0"> IU's
                        role as a desperate office worker in My Mister (2018) received critical acclaim, and she earned her
                        first Best Actress in Television nomination at the 55th Baeksang Arts Awards.</p>
                </li>
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0"> IU has released a total of five studio albums and nine EPs thus far, five
                        of which have reached
                        number one on the Gaon Album Chart, and thirty number-one singles, making her the artist with
                        the
                        most number-one songs in South Korea. One of the best-selling solo acts in the group-dominated
                        K-pop
                        industry.</p>
                </li>
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0">IU became the first solo female K-pop act to perform at the Olympic
                        Gymnastics Arena
                        during the Seoul leg of her 2019 Love, Poem concert tour and also the first Korean female
                        artist to hold a solo concert, The Golden Hour, at Seoul Olympic Stadium in Seoul on September
                        17
                        and 18, 2022. She has been included five times in the top ten of Forbes magazine's annual Korea
                        Power Celebrity list since 2012 and attained a peak ranking of number three that year.</p>
                </li>
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0">In 2014,
                        Billboard recognized IU as the all-time leader of its K-pop Hot 100 with the most number-one
                        songs
                        and the artist with the most weeks at the number-one position on the chart.</p>
                </li>
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0">She was named Gallup
                        Korea's Singer of the Year in 2014 and in 2017.</p>
                </li>
            </ul>
        </div>
    </div>
    <hr class="divider">
    <div class="container py-4" id="scrollspymember2">
        <header class="mb-3">
            <h2 class="text-uppercase lined mb-4">Zhao Liying</h2>
            <p class="lead">Zhao Liying (Chinese: 赵丽颖, born 16 October 1987), also known as Zanilia Zhao, is a Chinese
                actress and singer. She is best known for her roles in television series Legend of Lu Zhen (2013), Boss & Me
                (2014), The Journey of Flower (2015), The Mystic Nine (2016), Noble Aspirations (2016), Princess Agents
                (2017), The Story of Minglan (2018), and Legend of Fei (2020).</p>
        </header>
        <div class="row gy-4 mb-2">
            <div class="col-lg-8 col-md-6">
                <div class="text-muted text-sm">
                    <p> Zhao was born on 16 October 1987 in Langfang, Hebei. She graduated from Langfang School of
                        Electronic Information Engineering, a secondary professional training school. She has said of
                        this period:

                        I was born in a village, but it was the experience of rural life that strengthened my strong will
                        and gave me a firm and tenacious personality. It is these experiences that have made me who I am
                        today. So I think it is his strong heart, the persistent pursuit of dreams, the perseverance and
                        steadfastness of the profession which you are engaged in, as well as the calmness and stability when
                        facing the vanity that makes a hero.
                        In 2016, Zhao was named the tourism ambassador of Hebei. The same year, Zhao became the Vice
                        President of Yi Xia Technology.

                        Zhao unveiled her wax figure at Madame Tussauds Beijing in May 2017. The same year, Zhao was
                        chosen as a brand ambassador for Dior in China.

                        In March 2019, Zhao announced her partnership with Hesong Media.
                        On October 16, 2018, Zhao announced her marriage to actor Feng Shaofeng on Sina Weibo. On March
                        8, 2019, Zhao gave birth to a boy.

                        On April 23, 2021, Feng and Zhao announced their divorce on Sina Weibo, ending their two-year
                        marriage. They shared custody of their son.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6"><img class="img-fluid rounded-circle shadow p-2 mt-n3"
                    src="{{ asset('asset/teammember/img-163031608501861844bd53cb1ba6a85dd469a438ba8a1.jpg') }}"
                    alt="team member 1"></div>
        </div>
        <div class="row">
            <h3 class="text-uppercase lined mb-4">Reward</h3>
            <ul class="list-unstyled">
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0"> 2014 | 10th China Golden Eagle TV Art Festival Golden Eagle Goddess.
                    </p>
                </li>
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0"> 2015 | 6th Macau International Television Festival Best Actress | The Journey
                        of Flower.</p>
                </li>
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0">2016 | 28th China TV Golden Eagle Award | Best Actress | The Journey of
                        Flower.
                    </p>
                </li>
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0">2016 | 3rd Hengdian Film and TV Festival of China | Best Actress | The Mystic
                        Nine.</p>
                </li>
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0">2017 | 24th Beijing College Student Film Festival | Favorite Actress | Duckweed.
                    </p>
                </li>
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0">2020 | 30th China TV Golden Eagle Award | Audience's Choice for Actress | The
                        Story of Minglan.</p>
                </li>
                <li class="d-flex mb-3">
                    <div class="icon-filled me-2"><i class="fas fa-check"></i></div>
                    <p class="text-sm mb-0">Forbes China Celebrity 100
                        Of The Year |
                        2014 => 80th |
                        2015 => 43rd |
                        2017 => 4th |
                        2019 => 15th |
                        2020 => 7th |
                        2021 => 7th .</p>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@stop
