import React from 'react';

class Education extends React.Component{
    constructor(props){
        super(props);
        this.state={};
    }

    render() {
        return (
            <section className="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
                <div className="my-auto">
                    <h2 className="mb-5">教育培训</h2>

                    <div className="resume-item d-flex flex-column flex-md-row mb-5">
                        <div className="resume-content mr-auto">
                            <h3 className="mb-0">青岛农业大学</h3>
                            <div className="subheading mb-3">计算机科学与技术</div>
                            <div>主修课程：</div>
                            <p>Java SE, Java EE, Java Web, 日语, 数据结构, Oracel, 计算机网络, 设计模式等。</p>
                        </div>
                        <div className="resume-date text-md-right">
                            <span className="text-primary">2013.09 - 2017.07</span>
                        </div>
                    </div>

                    <div className="resume-item d-flex flex-column flex-md-row">
                        <div className="resume-content mr-auto">
                            <h3 className="mb-0">青岛英谷教育股份有有限公司</h3>
                            <div className="subheading mb-3">PHP实训</div>
                            <div>主修课程：</div>
                            <p>PHP，JavaScript, css, html, lunix等。</p>
                        </div>
                        <div className="resume-date text-md-right">
                            <span className="text-primary">2016.06 - 2016.09</span>
                        </div>
                    </div>

                </div>
            </section>
        );
    }
}

export default Education;