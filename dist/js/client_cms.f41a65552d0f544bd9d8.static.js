/*!For license information please see client_cms.f41a65552d0f544bd9d8.static.js.LICENSE.txt*/(self.webpackChunkJomashop=self.webpackChunkJomashop||[]).push([[3895,8517],{74238:(e,n,i)=>{"use strict"
i.r(n),i.d(n,{Block:()=>t.g,CmsBlockGroup:()=>CmsBlockGroup,CmsPageComponent:()=>CmsPageComponent,useQueryCmsBlocks:()=>useQueryCmsBlocks})
var a=i(67294),t=(i(45697),i(75079)),r=i(71641)
const d=JSON.parse('{"kind":"Document","definitions":[{"kind":"OperationDefinition","operation":"query","name":{"kind":"Name","value":"cmsBlocks"},"variableDefinitions":[{"kind":"VariableDefinition","variable":{"kind":"Variable","name":{"kind":"Name","value":"identifiers"}},"type":{"kind":"NonNullType","type":{"kind":"ListType","type":{"kind":"NamedType","name":{"kind":"Name","value":"String"}}}},"directives":[]}],"directives":[],"selectionSet":{"kind":"SelectionSet","selections":[{"kind":"Field","name":{"kind":"Name","value":"cmsBlocks"},"arguments":[{"kind":"Argument","name":{"kind":"Name","value":"identifiers"},"value":{"kind":"Variable","name":{"kind":"Name","value":"identifiers"}}}],"directives":[],"selectionSet":{"kind":"SelectionSet","selections":[{"kind":"Field","name":{"kind":"Name","value":"__typename"},"arguments":[],"directives":[]},{"kind":"Field","name":{"kind":"Name","value":"items"},"arguments":[],"directives":[],"selectionSet":{"kind":"SelectionSet","selections":[{"kind":"Field","name":{"kind":"Name","value":"__typename"},"arguments":[],"directives":[]},{"kind":"Field","name":{"kind":"Name","value":"content"},"arguments":[],"directives":[]},{"kind":"Field","name":{"kind":"Name","value":"identifier"},"arguments":[],"directives":[]}]}}]}}]}}],"loc":{"start":0,"end":125,"source":{"body":"query cmsBlocks($identifiers:[String]!){cmsBlocks(identifiers:$identifiers){__typename items{__typename content identifier}}}","name":"GraphQL request","locationOffset":{"line":1,"column":1}}},"id":"de6e11d0d6ebafd44b33de026bc356d826d018afd4192079c4fcec56811bf27a"}'),useQueryCmsBlocks=({identifiers:e,fetchPolicy:n,onServer:i})=>(0,r.a)(d,{variables:{identifiers:e,onServer:i},fetchPolicy:n,context:{should_request_skip_authorization:!0}})
var s=i(85893)
const CmsBlockGroup=({classes:e={},fetchPolicy:n,hasItemCallback:i,identifiers:r,loadingIndicator:d,onServer:l,BlockChild:o=null})=>{const{loading:c,error:u,data:m}=useQueryCmsBlocks({identifiers:r,onServer:l,fetchPolicy:n}),{items:v}=m&&m.cmsBlocks||{},k=!Array.isArray(v)||!v.length;(0,a.useEffect)((()=>{if(!k&&i)return i(v)}),[v])
const f="function"==typeof o?o:t.g,p=(0,a.useMemo)((()=>v&&v.map(((n,i)=>(0,s.jsx)(f,{className:e.block,index:i,...n},n.identifier)))),[v,e.block])
return!m&&c?d||null:u?(0,s.jsx)("div",{className:"cms-load-error",children:"Data Fetch Error"}):k?(0,s.jsx)("div",{children:"There are no blocks to display"}):(0,s.jsx)("div",{className:e.root,children:(0,s.jsx)("div",{className:e.content,children:p})})}
CmsBlockGroup.defaultProps={onServer:!1,fetchPolicy:"cache-and-network"}
const l=JSON.parse('{"kind":"Document","definitions":[{"kind":"OperationDefinition","operation":"query","name":{"kind":"Name","value":"getCmsPage"},"variableDefinitions":[{"kind":"VariableDefinition","variable":{"kind":"Variable","name":{"kind":"Name","value":"id"}},"type":{"kind":"NamedType","name":{"kind":"Name","value":"Int"}},"directives":[]},{"kind":"VariableDefinition","variable":{"kind":"Variable","name":{"kind":"Name","value":"hideDisabled"}},"type":{"kind":"NamedType","name":{"kind":"Name","value":"Boolean"}},"defaultValue":{"kind":"BooleanValue","value":true},"directives":[]},{"kind":"VariableDefinition","variable":{"kind":"Variable","name":{"kind":"Name","value":"onServer"}},"type":{"kind":"NonNullType","type":{"kind":"NamedType","name":{"kind":"Name","value":"Boolean"}}},"directives":[]},{"kind":"VariableDefinition","variable":{"kind":"Variable","name":{"kind":"Name","value":"identifier"}},"type":{"kind":"NamedType","name":{"kind":"Name","value":"String"}},"directives":[]}],"directives":[],"selectionSet":{"kind":"SelectionSet","selections":[{"kind":"Field","name":{"kind":"Name","value":"cmsPage"},"arguments":[{"kind":"Argument","name":{"kind":"Name","value":"id"},"value":{"kind":"Variable","name":{"kind":"Name","value":"id"}}},{"kind":"Argument","name":{"kind":"Name","value":"hideDisabled"},"value":{"kind":"Variable","name":{"kind":"Name","value":"hideDisabled"}}},{"kind":"Argument","name":{"kind":"Name","value":"identifier"},"value":{"kind":"Variable","name":{"kind":"Name","value":"identifier"}}}],"directives":[],"selectionSet":{"kind":"SelectionSet","selections":[{"kind":"Field","name":{"kind":"Name","value":"__typename"},"arguments":[],"directives":[]},{"kind":"Field","name":{"kind":"Name","value":"url_key"},"arguments":[],"directives":[]},{"kind":"Field","name":{"kind":"Name","value":"content"},"arguments":[],"directives":[]},{"kind":"Field","name":{"kind":"Name","value":"content_heading"},"arguments":[],"directives":[]},{"kind":"Field","name":{"kind":"Name","value":"title"},"arguments":[],"directives":[]},{"kind":"Field","name":{"kind":"Name","value":"page_layout"},"arguments":[],"directives":[]},{"kind":"Field","name":{"kind":"Name","value":"meta_title"},"arguments":[],"directives":[{"kind":"Directive","name":{"kind":"Name","value":"include"},"arguments":[{"kind":"Argument","name":{"kind":"Name","value":"if"},"value":{"kind":"Variable","name":{"kind":"Name","value":"onServer"}}}]}]},{"kind":"Field","name":{"kind":"Name","value":"meta_keywords"},"arguments":[],"directives":[{"kind":"Directive","name":{"kind":"Name","value":"include"},"arguments":[{"kind":"Argument","name":{"kind":"Name","value":"if"},"value":{"kind":"Variable","name":{"kind":"Name","value":"onServer"}}}]}]},{"kind":"Field","name":{"kind":"Name","value":"meta_description"},"arguments":[],"directives":[{"kind":"Directive","name":{"kind":"Name","value":"include"},"arguments":[{"kind":"Argument","name":{"kind":"Name","value":"if"},"value":{"kind":"Variable","name":{"kind":"Name","value":"onServer"}}}]}]}]}}]}}],"loc":{"start":0,"end":330,"source":{"body":"query getCmsPage($id:Int,$hideDisabled:Boolean = true,$onServer:Boolean!,$identifier:String){cmsPage(id:$id,hideDisabled:$hideDisabled,identifier:$identifier){__typename url_key content content_heading title page_layout meta_title @include(if:$onServer)meta_keywords @include(if:$onServer)meta_description @include(if:$onServer)}}","name":"GraphQL request","locationOffset":{"line":1,"column":1}}},"id":"812ec9840685b9b3d60c8fba41bba818efe3b10e335c28adc7bae8a764996ee7"}')
var o=i(14735),c=i(32430),u=i(13456)
const m=(0,a.memo)(o.RichContent),PreLoadedHeading=({fallback:e,pageId:n})=>{const{pageId:i,htmlContent:t}=(0,a.useMemo)((()=>(e=>{const n=e.getElementById("preload_data"),i=n?n.dataset:{},{preloadCmsPageId:a,preloadCmsPageHtmlContent:t}={...i}
return{pageId:parseInt(a)?parseInt(a):null,htmlContent:t}})(document)),[n,document])
return i===n&&t?(0,s.jsx)(o.RichContent,{html:t}):e||null},CmsPageComponent=({loadingIndicator:e,id:n,identifier:i,onServer:a,fetchPolicy:t})=>{const d=i?{identifier:i}:{id:n},{loading:o,error:v,data:k}=(0,r.a)(l,{variables:{onServer:a,...d},fetchPolicy:t,context:{should_request_skip_authorization:!0}})
if(!k&&o)return(0,s.jsx)(PreLoadedHeading,{pageId:n,fallback:e})
if(v)return(0,s.jsx)("div",{children:"Data Fetch Error"})
return k&&k.cmsPage&&k.cmsPage.content?(0,s.jsxs)(s.Fragment,{children:[(0,s.jsx)(c.SEO,{cmsPage:k.cmsPage,urlBase:{NODE_ENV:"production",SERVICE_WORKER:"./src/ServiceWorker/sw.js",BRAINTREE_TOKEN:void 0}.URL_BASE}),(0,s.jsx)(m,{html:k.cmsPage.content})]}):(0,s.jsx)(u.Z,{loading:o,notFound:!0})}
CmsPageComponent.defaultProps={onServer:!0,fetchPolicy:"cache-and-network"}},3561:(e,n,i)=>{"use strict"
i.d(n,{m:()=>SimpleLazyImage})
var a=i(85893)
const SimpleLazyImage=e=>{const{children:n,alt:i,src:t,noLazy:r,...d}=e,s=r?null:"lazy"
return(0,a.jsx)("img",{loading:s,alt:i,src:t,...d,children:n})}},51552:(e,n,i)=>{"use strict"
function priceFormat(e,n=2,i=2){return e?e.toLocaleString("en-US",{maximumFractionDigits:n,minimumFractionDigits:i}):0}i.d(n,{X:()=>priceFormat})},62498:(e,n,i)=>{"use strict"
i.d(n,{A7:()=>useIsCurrencyUsd,Bj:()=>usePriceFormat,mh:()=>useCurrencySymbol,zl:()=>usePriceByProduct})
var a=i(67294),t=i(66587),r=i(51552)
const usePriceFormat=()=>{const{state:{currency:e}}=(0,a.useContext)(t.$R)
return{priceFormat:(0,a.useCallback)(((n,i=2,a=2)=>{const t=n*(e?e.rate:1)
return(0,r.X)(t,i,a)}),[e&&e.rate])}},useCurrencySymbol=()=>{const{state:{currencySymbol:e}}=(0,a.useContext)(t.$R)
return e},useIsCurrencyUsd=()=>{const{state:{currency:e}}=(0,a.useContext)(t.$R)
return"USD"===e},usePriceByProduct=({msrp:e,plp_price:n,promotext_value_numbers_only:i,promotext_type:a})=>{const{priceFormat:t}=usePriceFormat(),r=useCurrencySymbol(),getPrice=e=>e?r+t(e):null,d=i?"fixed"===a?getPrice(i):`${i}%`:null,s=d?n.was_price:n.now_price,l=n.now_price
return{nowPrice:getPrice(s),wasPrice:e!==s&&getPrice(e),afterPrice:getPrice(l),promotionText:d}}},4411:(e,n,i)=>{"use strict"
i(29957)
i(80496)},80496:(e,n,i)=>{"use strict"
i.r(n),i.d(n,{default:()=>CMS})
var a=i(67294),t=i(74238),r=i(95913),d=i(45086),s=i(18719),l=i(95615),o=(i(87134),i(85893))
const c=(0,a.lazy)((()=>i.e(9298).then(i.bind(i,69298)))),CMS=({id:e})=>{const{isNewDesignContext:n}=(0,a.useContext)(l.p),i=(0,a.useContext)(d.Ls),u="/"===window.location.pathname,m=u?n?"home-new-design":"home":null
return(0,a.useEffect)((()=>{(0,s.RO)(u?"home-page":"common-page"),i({type:"UPDATE_PAGE_TYPE",payload:u?"home":"cms"})}),[]),(0,o.jsxs)(a.Fragment,{children:[(0,o.jsx)(a.Suspense,{fallback:()=>null,children:n&&(0,o.jsx)(c,{})}),(0,o.jsx)(t.CmsPageComponent,{id:e,identifier:m,loadingIndicator:(0,o.jsx)(r.Z,{})})]})}},87134:()=>{},35005:(e,n,i)=>{"use strict"
i.d(n,{Z:()=>m})
var a=i(87462),t=i(63366),r=i(44036),d=i.n(r),s=i(67294),l=i(76792),o=i(48358),c=["bsPrefix","variant","size","active","className","block","type","as"],u=s.forwardRef((function(e,n){var i=e.bsPrefix,r=e.variant,u=e.size,m=e.active,v=e.className,k=e.block,f=e.type,p=e.as,g=(0,t.Z)(e,c),y=(0,l.vE)(i,"btn"),h=d()(v,y,m&&"active",r&&y+"-"+r,k&&y+"-block",u&&y+"-"+u)
if(g.href)return s.createElement(o.Z,(0,a.Z)({},g,{as:p,ref:n,className:d()(h,g.disabled&&"disabled")}))
n&&(g.ref=n),f?g.type=f:p||(g.type="button")
var b=p||"button"
return s.createElement(b,(0,a.Z)({},g,{className:h}))}))
u.displayName="Button",u.defaultProps={variant:"primary",active:!1,disabled:!1}
const m=u},48358:(e,n,i)=>{"use strict"
i.d(n,{Z:()=>o})
var a=i(87462),t=i(63366),r=i(67294),d=i(16833),s=["as","disabled","onKeyDown"]
function isTrivialHref(e){return!e||"#"===e.trim()}var l=r.forwardRef((function(e,n){var i=e.as,l=void 0===i?"a":i,o=e.disabled,c=e.onKeyDown,u=(0,t.Z)(e,s),m=function handleClick(e){var n=u.href,i=u.onClick;(o||isTrivialHref(n))&&e.preventDefault(),o?e.stopPropagation():i&&i(e)}
return isTrivialHref(u.href)&&(u.role=u.role||"button",u.href=u.href||"#"),o&&(u.tabIndex=-1,u["aria-disabled"]=!0),r.createElement(l,(0,a.Z)({ref:n},u,{onClick:m,onKeyDown:(0,d.Z)((function handleKeyDown(e){" "===e.key&&(e.preventDefault(),m(e))}),c)}))}))
l.displayName="SafeAnchor"
const o=l},76792:(e,n,i)=>{"use strict"
i.d(n,{vE:()=>useBootstrapPrefix})
var a=i(67294),t=a.createContext({})
t.Consumer,t.Provider
function useBootstrapPrefix(e,n){var i=(0,a.useContext)(t)
return e||i[n]||n}},16833:(e,n,i)=>{"use strict"
i.d(n,{Z:()=>a})
const a=function createChainedFunction(){for(var e=arguments.length,n=new Array(e),i=0;i<e;i++)n[i]=arguments[i]
return n.filter((function(e){return null!=e})).reduce((function(e,n){if("function"!=typeof n)throw new Error("Invalid Argument Type, must only provide functions, undefined, or null.")
return null===e?n:function chainedFunction(){for(var i=arguments.length,a=new Array(i),t=0;t<i;t++)a[t]=arguments[t]
e.apply(this,a),n.apply(this,a)}}),null)}},44036:(e,n)=>{var i
!function(){"use strict"
var a={}.hasOwnProperty
function classNames(){for(var e=[],n=0;n<arguments.length;n++){var i=arguments[n]
if(i){var t=typeof i
if("string"===t||"number"===t)e.push(i)
else if(Array.isArray(i)){if(i.length){var r=classNames.apply(null,i)
r&&e.push(r)}}else if("object"===t){if(i.toString!==Object.prototype.toString&&!i.toString.toString().includes("[native code]")){e.push(i.toString())
continue}for(var d in i)a.call(i,d)&&i[d]&&e.push(d)}}}return e.join(" ")}e.exports?(classNames.default=classNames,e.exports=classNames):void 0===(i=function(){return classNames}.apply(n,[]))||(e.exports=i)}()}},e=>{e.O(0,[6179,2743,1882,1634],(()=>{return n=4411,e(e.s=n)
var n}))
e.O()}])