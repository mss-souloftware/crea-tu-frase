/*! For license information please see clt_script.js.LICENSE.txt */ (() => {
    "use strict";
    function e(e, t) {
        for (var n = 0; n < t.length; n++) {
            var a = t[n];
            (a.enumerable = a.enumerable || !1), (a.configurable = !0), "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a);
        }
    }
    let t = (function () {
        var t, n;
        function a() {
            !(function (e, t) {
                if (!(e instanceof t)) throw TypeError("Cannot call a class as a function");
            })(this, a),
                this.init();
        }
        return (
            (t = a),
            (n = [
                {
                    key: "init",
                    value: function () {
                        document.addEventListener("click", function (n) {
                            "statusProces" === n.target.id.split("_")[1] && n.target.id.split("_")[2] && e(n.target.id.split("_")[0], n.target.id.split("_")[2], t(n.target.id.split("_")[0]), n.target.lastChild, n.target.id.split("_")[3]);
                        });
                        var e = function (e, t, n, a, r) {
                                var o;
                                if (((o = "eliminar" != e && r.includes("*") ? r.replace(/(\*)/g, "_") : r), window.confirm(n))) {
                                    a.style.display = "inline";
                                    var i = "action=proces&upcomingStatus=".concat(e, "&id=").concat(t, "&email=").concat(o);
                                    jQuery.ajax({
                                        type: "post",
                                        url: ajax_variables.ajax_url,
                                        dataType: "json",
                                        data: i,
                                        error: function (e) {
                                            console.error(e);
                                        },
                                        success: function (e) {
                                            1 == e.dataSucess && "sucessfull" === e.mailSend && ((a.style.display = "none"), location.reload());
                                            location.reload();
                                        },
                                    });
                                }
                            },
                            t = function (e) {
                                return "proceso" === e
                                    ? "Est\xe1 cambiando el estado de este pedido a modo. En Proceso! El usuario recibir\xe1 un email con esta confirmacion. acepte para confirmar!"
                                    : "envio" === e
                                    ? "Est\xe1 cambiando el estado del envio del pedido a estado, En Enviado! El usuario recibir\xe1 un email con esta confirmacion. acepte para confirmar!"
                                    : "eliminar" === e
                                    ? "Con esta acci\xf3n, eliminar\xe1 los datos de este usuario, estos datos no son recuperables, acepte si desea continuar!"
                                    : null;
                            };
                    },
                },
            ]),
            e(t.prototype, n),
            Object.defineProperty(t, "prototype", { writable: !1 }),
            a
        );
    })();
    document.getElementById("getText"), document.getElementById("counter"), document.getElementById("actual"), document.getElementById("stripeErrorMessage"), document.getElementById("cancelProcessPaiment");
    var n = document.getElementById("conditionalSubmit"),
        a =
            (document.getElementsByClassName("chocoletrasPlg__wrapperCode-dataUser-form-input-price")[0],
            document.getElementById("chocoTel"),
            document.getElementById("continuarBTN"),
            document.getElementById("hideDetails"),
            document.getElementById("backBTN"),
            document.getElementsByClassName("chocoletrasPlg__wrapperCode-firstHead-wrapper-ulWrapperFirst-liTable")[0],
            document.getElementsByClassName("chocoletrasPlg-spiner")[0],
            document.getElementsByClassName("chocoletrasPlg__wrapperCode-firstHead-dataUser")[0],
            document.getElementsByClassName(" chocoletrasPlg__wrapperCode-payment")[0],
            document.getElementsByClassName("chocoletrasPlg__wrapperCode-firstHead")[0],
            document.getElementsByName("chocofrase")[0],
            document.getElementsByClassName("chocoletrasPlg__wrapperCode-dataUser-form")[0],
            ["publishableKey", "secretKey", "stripeSubmit"]),
        r = [
            "conditionalSubmit_precLetras",
            "conditionalSubmit_precCorazon",
            "conditionalSubmit_precEnvio",
            "expressShipinglSubmit_Page",
            "conditionalSubmit_maximoC",
            "conditionalSubmit_Gminimo",
            "conditionalSubmit_Page",
            "termCondlSubmit_Page",
            "saturdayShipinglSubmit_Page",
        ],
        o = ["ouputCltHost", "ouputCltPort", "ouputCltSecure", "ouputCltemail", "ouputCltPass"],
        i = document.getElementById("itemsEmaiBtn");
    function l(e, t) {
        for (var n = 0; n < t.length; n++) {
            var a = t[n];
            (a.enumerable = a.enumerable || !1), (a.configurable = !0), "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a);
        }
    }
    let s = (function () {
        var e, t;
        function a() {
            !(function (e, t) {
                if (!(e instanceof t)) throw TypeError("Cannot call a class as a function");
            })(this, a),
                this.init();
        }
        return (
            (e = a),
            (t = [
                {
                    key: "init",
                    value: function () {
                        n && n.addEventListener("click", this.processconditional);
                    },
                },
                {
                    key: "processconditional",
                    value: function () {
                        for (var e = [], t = 0; t < r.length; t++) e.push(document.getElementsByName(r[t])[0]);
                        var n = e
                                .filter(function (e) {
                                    return "" != e.value;
                                })
                                .map(function (e) {
                                    return "".concat(e.name, "=").concat(e.value);
                                })
                                .join("&"),
                            a = "action=conditionales&".concat(n);
                        jQuery.ajax({
                            type: "post",
                            url: ajax_variables.ajax_url,
                            dataType: "json",
                            data: a,
                            error: function (e) {
                                console.error(e);
                            },
                            success: function (e) {
                                0 === e.salida.length ? console.log("nada que hacer!") : location.reload();
                            },
                        });
                    },
                },
            ]),
            l(e.prototype, t),
            Object.defineProperty(e, "prototype", { writable: !1 }),
            a
        );
    })();
    function c(e, t) {
        for (var n = 0; n < t.length; n++) {
            var a = t[n];
            (a.enumerable = a.enumerable || !1), (a.configurable = !0), "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a);
        }
    }
    let u = (function () {
        var e, t;
        function n() {
            !(function (e, t) {
                if (!(e instanceof t)) throw TypeError("Cannot call a class as a function");
            })(this, n),
                this.init();
        }
        return (
            (e = n),
            (t = [
                {
                    key: "init",
                    value: function () {
                        document.getElementById(a[2]) && document.getElementById(a[2]).addEventListener("click", this.saveKeys);
                    },
                },
                {
                    key: "saveKeys",
                    value: function () {
                        var e = document.getElementsByName(a[0])[0],
                            t = document.getElementsByName(a[1])[0];
                        e.value && t.value
                            ? jQuery.ajax({
                                  type: "post",
                                  url: ajax_variables.ajax_url,
                                  dataType: "json",
                                  data: "action=saveStripekeys&publishablekey=".concat(e.value, "&secretKey=").concat(t.value),
                                  error: function (e) {
                                      console.log(e);
                                  },
                                  success: function (n) {
                                      n.results.secretKey &&
                                          ((t.style.border = "solid 2px #82d310"),
                                          setTimeout(function () {
                                              t.style.border = "initial";
                                          }, 3e3)),
                                          n.results.publishablekey &&
                                              ((e.style.border = "solid 2px #82d310"),
                                              setTimeout(function () {
                                                  e.style.border = "initial";
                                              }, 3e3));
                                  },
                              })
                            : alert("Favor llenar ambos parametros!...");
                    },
                },
            ]),
            c(e.prototype, t),
            Object.defineProperty(e, "prototype", { writable: !1 }),
            n
        );
    })();
    function d(e, t) {
        var n = ("undefined" != typeof Symbol && e[Symbol.iterator]) || e["@@iterator"];
        if (!n) {
            if (
                Array.isArray(e) ||
                (n = (function (e, t) {
                    if (e) {
                        if ("string" == typeof e) return f(e, t);
                        var n = Object.prototype.toString.call(e).slice(8, -1);
                        return "Object" === n && e.constructor && (n = e.constructor.name), "Map" === n || "Set" === n ? Array.from(e) : "Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n) ? f(e, t) : void 0;
                    }
                })(e)) ||
                (t && e && "number" == typeof e.length)
            ) {
                n && (e = n);
                var a = 0,
                    r = function () {};
                return {
                    s: r,
                    n: function () {
                        return a >= e.length ? { done: !0 } : { done: !1, value: e[a++] };
                    },
                    e: function (e) {
                        throw e;
                    },
                    f: r,
                };
            }
            throw TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
        }
        var o,
            i = !0,
            l = !1;
        return {
            s: function () {
                n = n.call(e);
            },
            n: function () {
                var e = n.next();
                return (i = e.done), e;
            },
            e: function (e) {
                (l = !0), (o = e);
            },
            f: function () {
                try {
                    i || null == n.return || n.return();
                } finally {
                    if (l) throw o;
                }
            },
        };
    }
    function f(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var n = 0, a = Array(t); n < t; n++) a[n] = e[n];
        return a;
    }
    function p(e, t) {
        for (var n = 0; n < t.length; n++) {
            var a = t[n];
            (a.enumerable = a.enumerable || !1), (a.configurable = !0), "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a);
        }
    }
    let m = (function () {
        var e, t;
        function n() {
            !(function (e, t) {
                if (!(e instanceof t)) throw TypeError("Cannot call a class as a function");
            })(this, n),
                this.init();
        }
        return (
            (e = n),
            (t = [
                {
                    key: "init",
                    value: function () {
                        i &&
                            i.addEventListener("click", function (t) {
                                t.preventDefault(), e();
                            });
                        var e = function () {
                                var e,
                                    a = [],
                                    r = d(o);
                                try {
                                    for (r.s(); !(e = r.n()).done; ) {
                                        var i = e.value;
                                        a.push(document.getElementsByName(i));
                                    }
                                } catch (l) {
                                    r.e(l);
                                } finally {
                                    r.f();
                                }
                                var s = a.filter(function (e) {
                                    return "" == e[0].value;
                                });
                                s.length <= 0 ? n(a) : t(s);
                            },
                            t = function (e) {
                                for (
                                    var t = function (t) {
                                            (e[t][0].style.border = "solid 1px red"),
                                                setTimeout(function () {
                                                    e[t][0].style.border = "solid 1px #8c8f94";
                                                }, 800);
                                        },
                                        n = 0;
                                    n < e.length;
                                    n++
                                )
                                    t(n);
                            },
                            n = function (e) {
                                var t = e
                                    .filter(function (e) {
                                        return "" != e[0].value;
                                    })
                                    .map(function (e) {
                                        return "".concat(e[0].name, "=").concat(e[0].value);
                                    })
                                    .join("&");
                                jQuery.ajax({
                                    type: "post",
                                    url: ajax_variables.ajax_url,
                                    dataType: "json",
                                    data: "action=saveOptionsEmail&".concat(t),
                                    error: function (e) {
                                        console.log(e);
                                    },
                                    success: function (e) {
                                        var t,
                                            n = d(e);
                                        try {
                                            for (n.s(); !(t = n.n()).done; ) {
                                                var a = t.value;
                                                document.getElementsByName(a)[0].style.border = "solid 1px green";
                                            }
                                        } catch (r) {
                                            n.e(r);
                                        } finally {
                                            n.f();
                                        }
                                    },
                                });
                            };
                    },
                },
            ]),
            p(e.prototype, t),
            Object.defineProperty(e, "prototype", { writable: !1 }),
            n
        );
    })();
    function y(e, t) {
        for (var n = 0; n < t.length; n++) {
            var a = t[n];
            (a.enumerable = a.enumerable || !1), (a.configurable = !0), "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a);
        }
    }
    let v = (function () {
        var e, t;
        function n(e) {
            !(function (e, t) {
                if (!(e instanceof t)) throw TypeError("Cannot call a class as a function");
            })(this, n),
                (this.id = e),
                this.init(this.id);
        }
        return (
            (e = n),
            (t = [
                {
                    key: "init",
                    value: function (e) {
                        var t = e.split("_")[1];
                        window.confirm("Esta a punto de borrar este reporte con id: ".concat(t, ", est\xe1 seguro?")) &&
                            jQuery.ajax({
                                type: "post",
                                url: ajax_variables.ajax_url,
                                dataType: "text",
                                data: "action=dellReport&id=".concat(t),
                                error: function (e) {
                                    console.error(e);
                                },
                                success: function (e) {
                                    1 === JSON.parse(e).result && location.reload();
                                },
                            });
                    },
                },
            ]),
            y(e.prototype, t),
            Object.defineProperty(e, "prototype", { writable: !1 }),
            n
        );
    })();
    window.onload = function () {
        (window.processaction = new t()),
            (window.processConditional = new s()),
            (window.stripeKeys = new u()),
            (window.sendItemsEmail = new m()),
            document.addEventListener("click", function (e) {
                "deletteReport" === e.target.classList[0] && (window.deletteReport = new v(e.target.classList[1]));
                var t = "openPannel" === e.target.id.split("_")[0] ? e.target.id.split("_")[1] : null;
                t && g(t);
            });
    };
    var g = function (e) {
        var t = document.getElementById("infoPannel_" + e);
        1 === t.classList.length ? t.classList.add("openpannel") : t.classList.remove("openpannel");
    };
})();
