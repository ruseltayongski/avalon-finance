@extends('layouts.app')

@section('content')

@section('css')

   <style>
      /* SELECT 2 CSS */
      .mult-select-tag {
      display: flex;
         width: 100%;
         flex-direction: column;
         align-items: center;
         position: relative;
         --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
         --tw-shadow-color: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
         --border-color: rgb(218, 221, 224);
         font-family: Verdana, sans-serif;
      }
      .mult-select-tag .wrapper {
         width: 100%;
      }
      .mult-select-tag .body {
         display: flex;
         border: 1px solid var(--border-color);
         background: #fff;
         min-height: 2.15rem;
         width: 100%;
         min-width: 14rem;
      }
      .mult-select-tag .input-container {
         display: flex;
         flex-wrap: wrap;
         flex: 1 1 auto;
         padding: 0.1rem;
         align-items: center;
      }
      .mult-select-tag .input-body {
         display: flex;
         width: 100%;
      }
      .mult-select-tag .input {
         flex: 1;
         background: 0 0;
         border-radius: 0.25rem;
         padding: 0.45rem;
         margin: 10px;
         color: #2d3748;
         outline: 0;
         border: 1px solid var(--border-color);
      }
      .mult-select-tag .btn-container {
         color: #e2ebf0;
         padding: 0.5rem;
         display: flex;
         border-left: 1px solid var(--border-color);
      }
      .mult-select-tag button {
         cursor: pointer;
         width: 100%;
         color: #718096;
         outline: 0;
         height: 100%;
         border: none;
         padding: 0;
         background: 0 0;
         background-image: none;
         -webkit-appearance: none;
         text-transform: none;
         margin: 0;
      }
      .mult-select-tag button:first-child {
         width: 1rem;
         height: 90%;
      }
      .mult-select-tag .drawer {
         position: absolute;
         background: #fff;
         max-height: 15rem;
         z-index: 40;
         top: 98%;
         width: 100%;
         overflow-y: scroll;
         border: 1px solid var(--border-color);
         border-radius: 0.25rem;
      }
      .mult-select-tag ul {
         list-style-type: none;
         padding: 0.5rem;
         margin: 0;
      }
      .mult-select-tag ul li {
         padding: 0.5rem;
         border-radius: 0.25rem;
         cursor: pointer;
      }
      .mult-select-tag ul li:hover {
         background: rgb(243 244 246);
      }
      .mult-select-tag .item-container {
         display: flex;
         justify-content: center;
         align-items: center;
         padding: 0.2rem 0.4rem;
         margin: 0.2rem;
         font-weight: 500;
         border: 1px solid;
         border-radius: 9999px;
      }
      .mult-select-tag .item-label {
         max-width: 100%;
         line-height: 1;
         font-size: 0.75rem;
         font-weight: 400;
         flex: 0 1 auto;
      }
      .mult-select-tag .item-close-container {
         display: flex;
         flex: 1 1 auto;
         flex-direction: row-reverse;
      }
      .mult-select-tag .item-close-svg {
         width: 1rem;
         margin-left: 0.5rem;
         height: 1rem;
         cursor: pointer;
         border-radius: 9999px;
         display: block;
      }
      .mult-select-tag .shadow {
         box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
      }
      .mult-select-tag .rounded {
         border-radius: 0.375rem;
      }
   </style>

@endsection
<div 
    :class="{ 'relative z-10 bg-cover bg-center bg-no-repeat pt-[30px] pb-20 md:pt-[100px]': isMobile, 'z-10 relative bacground-image-hero': !isMobile }"
    :style="isMobile ? 'background-image: url({{ asset('/images/v2crop.png') }})' : ''">
</div>

<select name="services" id="services" style="z-index: 99999;" multiple>
   {{-- <option value="1">Afghanistan</option>
   <option value="2">Australia</option>
   <option value="3">Germany</option>
   <option value="4">Canada</option>
   <option value="5">Russia</option> --}}
</select>

<button class="bg-yellow mt-[400px]" onclick="addOption()">Add Option</button>

<button class="bg-red text-white" onclick="clearData()">Clear Option</button>

@endsection

@section('js')

<script>
   function MultiSelectTag(e, t = { shadow: !1, rounded: !0 }) {
      var n = null,
         l = null,
         d = null,
         a = null,
         s = null,
         i = null,
         o = null,
         r = null,
         c = null,
         u = null,
         p = null,
         v = null,
         m = t.tagColor || {},
         h = new DOMParser();

      var business = "Business Affairs";
      var tech = "Tech & Dev";
      var digital = "Digital Media & Marketing";
      var book = "Book-to-film/TV";
      var creation = "Book Creation";

      function f(e = null, x = null) {
         if(e) {
            l = [];
            var regex = new RegExp(".*" + e.toLowerCase() + ".*");
            if (regex.test(business.toLowerCase())) {
               l = [
                  {
                     "value": "1",
                     "label": "Business1",
                     "selected": false
                  },
                  {
                     "value": "2",
                     "label": "Business2",
                     "selected": false
                  },
                  {
                     "value": "3",
                     "label": "Business3",
                     "selected": false
                  },
                  {
                     "value": "4",
                     "label": "Business4",
                     "selected": false
                  },
                  {
                     "value": "5",
                     "label": "Business5",
                     "selected": false
                  }
               ];
            }
            else if (regex.test(tech.toLowerCase())) {
               l = [
                  {
                     "value": "1",
                     "label": "Tech1",
                     "selected": false
                  },
                  {
                     "value": "2",
                     "label": "Tech2",
                     "selected": false
                  },
                  {
                     "value": "3",
                     "label": "Tech3",
                     "selected": false
                  },
                  {
                     "value": "4",
                     "label": "Tech4",
                     "selected": false
                  },
                  {
                     "value": "5",
                     "label": "Tech1",
                     "selected": false
                  }
               ];
            }
            else if (regex.test(digital.toLowerCase())) {
               l = [
                  {
                     "value": "1",
                     "label": "Book1",
                     "selected": false
                  },
                  {
                     "value": "2",
                     "label": "Book2",
                     "selected": false
                  },
                  {
                     "value": "3",
                     "label": "Book3",
                     "selected": false
                  },
                  {
                     "value": "4",
                     "label": "Book4",
                     "selected": false
                  },
                  {
                     "value": "5",
                     "label": "Boo5",
                     "selected": false
                  }
               ];
            }
            else if (regex.test(book.toLowerCase())) {
               l = [
                  {
                     "value": "1",
                     "label": "Business1",
                     "selected": false
                  },
                  {
                     "value": "2",
                     "label": "Business2",
                     "selected": false
                  },
                  {
                     "value": "3",
                     "label": "Business3",
                     "selected": false
                  },
                  {
                     "value": "4",
                     "label": "Business4",
                     "selected": false
                  },
                  {
                     "value": "5",
                     "label": "Business5",
                     "selected": false
                  }
               ];
            }
            else if (regex.test(creation.toLowerCase())) {
               l = [
                  {
                     "value": "1",
                     "label": "Creation1",
                     "selected": false
                  },
                  {
                     "value": "2",
                     "label": "Creation2",
                     "selected": false
                  },
                  {
                     "value": "3",
                     "label": "Creation3",
                     "selected": false
                  },
                  {
                     "value": "4",
                     "label": "Creation4",
                     "selected": false
                  },
                  {
                     "value": "5",
                     "label": "Creation5",
                     "selected": false
                  }
               ];
            }
         }
         else if(x) {
            l = x;
         }
         for (var t of ((v.innerHTML = ""), l)) {
            if (t.selected) {
               console.log("selected");
               !w(t.value) && g(t);
            }
            else {
               const n = document.createElement("li");
               (n.innerHTML = t.label);
               (n.dataset.value = t.value);
               console.log(n)
               v.appendChild(n);
               // if(e && t.label.toLowerCase().startsWith(e.toLowerCase())) {
               //    v.appendChild(n)
               // }
               // else {
               //    // e || v.appendChild(n);
               //    if (!e) {
               //       v.appendChild(n);
               //    }
               // }  
            }
         }
      }

      function g(e) {
         const t = document.createElement("div");
         t.classList.add("item-container"), (t.style.color = m.textColor || "#2c7a7b"), (t.style.borderColor = m.borderColor || "#81e6d9"), (t.style.background = m.bgColor || "#e6fffa");
         const n = document.createElement("div");
         n.classList.add("item-label"), (n.style.color = m.textColor || "#2c7a7b"), (n.innerHTML = e.label), (n.dataset.value = e.value);
         const d = new DOMParser().parseFromString(
               '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="item-close-svg">\n                <line x1="18" y1="6" x2="6" y2="18"></line>\n                <line x1="6" y1="6" x2="18" y2="18"></line>\n                </svg>',
               "image/svg+xml"
         ).documentElement;
         d.addEventListener("click", (t) => {
               (l.find((t) => t.value == e.value).selected = !1), C(e.value), f(), E();
         }),
               t.appendChild(n),
               t.appendChild(d),
               o.append(t);
      }

      function L() {
         for (var e of v.children)
            e.addEventListener("click", (e) => {
               (l.find((t) => t.value == e.target.dataset.value).selected = !0), (c.value = null), f(), E(), c.focus();
            });
      }

      function w(e) {
         for (var t of o.children) if (!t.classList.contains("input-body") && t.firstChild.dataset.value == e) return !0;
         return !1;
      }

      function C(e) {
         for (var t of o.children) t.classList.contains("input-body") || t.firstChild.dataset.value != e || o.removeChild(t);
      }

      function E(e = !0) {
         selected_values = [];
         for (var d = 0; d < l.length; d++) (n.options[d].selected = l[d].selected), l[d].selected && selected_values.push({ label: l[d].label, value: l[d].value });
         e && t.hasOwnProperty("onChange") && t.onChange(selected_values);
      }

      (n = document.getElementById(e)),
         (function () {
               (l = [...n.options].map((e) => ({ value: e.value, label: e.label, selected: e.selected }))),
                  n.classList.add("hidden"),
                  (d = document.createElement("div")).classList.add("mult-select-tag"),
                  (a = document.createElement("div")).classList.add("wrapper"),
                  (i = document.createElement("div")).classList.add("body"),
                  t.shadow && i.classList.add("shadow"),
                  t.rounded && i.classList.add("rounded"),
                  (o = document.createElement("div")).classList.add("input-container"),
                  (c = document.createElement("input")).classList.add("input"),
                  (c.placeholder = `${t.placeholder || "Search..."}`),
                  (r = document.createElement("inputBody")).classList.add("input-body"),
                  r.append(c),
                  i.append(o),
                  (s = document.createElement("div")).classList.add("btn-container"),
                  ((u = document.createElement("button")).type = "button"),
                  s.append(u);
               const e = h.parseFromString(
                  '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">\n            <polyline points="18 15 12 21 6 15"></polyline></svg>',
                  "image/svg+xml"
               ).documentElement;
               u.append(e),
                  i.append(s),
                  a.append(i),
                  (p = document.createElement("div")).classList.add("drawer", "hidden"),
                  t.shadow && p.classList.add("shadow"),
                  t.rounded && p.classList.add("rounded"),
                  p.append(r),
                  (v = document.createElement("ul")),
                  p.appendChild(v),
                  d.appendChild(a),
                  d.appendChild(p),
                  n.nextSibling ? n.parentNode.insertBefore(d, n.nextSibling) : n.parentNode.appendChild(d);
         })(),
         f(),
         L(),
         E(!1),
         u.addEventListener("click", () => {
               p.classList.contains("hidden") && (f(), L(), p.classList.remove("hidden"), c.focus());
         }),
         c.addEventListener("keyup", (e) => {
            f(e.target.value,null);
            L();
         }),
         c.addEventListener("keydown", (e) => {
               if ("Backspace" === e.key && !e.target.value && o.childElementCount > 1) {
                  const e = i.children[o.childElementCount - 2].firstChild;
                  (l.find((t) => t.value == e.dataset.value).selected = !1), C(e.dataset.value), E();
               }
         }),
         window.addEventListener("click", (e) => {
               d.contains(e.target) || p.classList.add("hidden");
         });

         return {
            f: f,
         };
   }
   
   var select_element = new MultiSelectTag('services')

   function addOption() {
      select_element.f(null,[
         {
            "value": "1",
            "label": "Coach",
            "selected": false
         },
         {
            "value": "2",
            "label": "Jude",
            "selected": false
         },
      ]);
   }
</script>

@endsection
