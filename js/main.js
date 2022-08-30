
const krpano = document.getElementById("krpanoSWFObject");
const elPopup3D = $(".popup-3d");
const elPopupVideo = $(".popup-video");
const elVideo = document.getElementById("main-video");
function loadScene(name)
{
    krpano.call("loadscene(" + name + ",null,MERGE,OPENBLEND(1.0, -0.5, 0.3, 0.8, linear))");
}
function showMenu(parent, hidden = 0)
{
    if (parent.hasClass('show') || hidden == 1)
    {
        parent.removeClass("show");
    } else
    {
        parent.addClass('show');
    }
}
function activeMenu()
{
    var sceneName = krpano.get("scene[get(xml.scene)].name");
    $(".drop-menu-main li").removeClass('active');
    $(`.drop-menu-main li[data-scene='${sceneName}']`).addClass('active');
}
$(".btn-drop-menu").on("click", function (e)
{
    showMenu($(this).parent());
});
$(".drop-menu li").on("click", function (e)
{
    var el = $(this);
    if (el.data('scene'))
    {
        loadScene(el.data('scene'));
        elPopup3D.removeClass("active")
    }
    if (el.data('3d'))
    {
        popup(el.data('3d'));
    }
    if (el.hasClass('video'))
    {
        elPopupVideo.addClass("active");
        if (elVideo.paused)
        {
            elVideo.play();
            krpano.call("pausesound(s1);")
        }
    }
    if (el.data('video'))
    {
        var parent = el.parent();
        (parent.find("li")).removeClass("active");
        el.addClass("active");
        elVideo.src = `videos/${el.data('video')}.mp4`;
        if (elVideo.paused)
        {
            elVideo.play();
        }
    }
    activeMenu();
});
$('.close-video').on("click", function (e)
{
    elPopupVideo.removeClass("active");
    elVideo.pause();
    krpano.call("playsound(s1);")
});
function popup(href = "")
{
    if (!elPopup3D.hasClass("active"))
    {
        elPopup3D.addClass("active")
    }
    var elIframe = elPopup3D.find('iframe');
    elIframe.attr('src', href + '&play=1&qs=1');
}