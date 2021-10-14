# 4WW3_project  
Course name: Web Computing and Web Systems  
Group name: True Roofs  
Member 1: Abeer Alyasiri  
Member 2: Lin Rozenszajn  
<br>  
_____________________________________________  
### Project Link  
Check out the project page at [True Roofs](http://3.130.249.183/index.html)  
<br>  

_____________________________________________  
### Demo Link  
Check out the Youtube video at [page tour](https://youtube.com/)  
<br>  

_____________________________________________
### Notes  
1. All resources used to build the project are under references.txt
2. Most of the dropdowns will be later changed using JS.
3. WCAG that was followed for the project is https://www.w3.org/WAI/WCAG21/quickref/#text-alternatives.

_____________________________________________
### Add-on #2 Answers
1. Section 2(a) describes how to embed different versions (of different sizes and pixel densities) of an image in your html code. For example:

    ```
    <picture>
    <source media="(max-width: 1000px)" srcset="../assets/images/main-1x.png, main-1x.png 1x">
    <source media="(max-width: 2000px)" srcset="../assets/images/main-2x.png, main-2x.png 2x">
    <img src="../assets/images/main.jpg" alt="main listing photo">
    </picture>
    ```

  The picture element contains source tags, srcset attributes and an element. The browser will look for the first source tag whose media query matches the width of the active viewport. The srcset attribute contains the file path of the image to be used if the media query returns true followed by an image descriptor which describes the pixel density of the image. If no media queries evaluate to true or the browser does not support the <picture> element, the url in the src attribute of the img element is used.
<br>
3. Three positive goals that can be achieved through use of the <picture> and <source> attributes are:
  <br>
  i. They can be used to offer alternative image formats, in case one is not supported by the browser.
  <br>
  ii. They can optimize bandwidth and speed, by selectively loading images that are sized appropriately for the viewer's screen.
    <br>
  iii. Offering different images for different media conditions: ie. a cropped image for a smaller display, or a higher-resolution imager for a larger display.
    <br>
4. One negative to using picture and source attributes is that they might not be supported on certain browsers (for example, Internet Explorer). This can be mitigated by including an img element, which acts as a "fallback" option if none of the media queries evaluate to true/none of the image formats are supported/the picture element isn't supported. 
