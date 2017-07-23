<?php
/***********************************************************************
 * This Source Code Form is subject to the terms of the Mozilla Public *
 * License, v. 2.0. If a copy of the MPL was not distributed with this *
 * file, You can obtain one at http://mozilla.org/MPL/2.0/.            *
 ***********************************************************************/

ini_set('default_charset', 'utf-8');
define('DATETIME', 'Y-m-d g:i A T');
define('DATETIMESIMPLE', 'Y-m-d H:i');
define('DATESIMPLE', 'Y-m-d');

$lang = array(
    'Home'=>'الصفحة الرئيسية',
    'RiskManagement'=>'إدارة المخاطر',
    'Reporting'=>'إعداد التقارير',
    'Configure'=>'تكوين',
    'MyProfile'=>'ملف التعريف الخاص بي',
    'Logout'=>'تسجيل الخروج',
    'LogInHere'=>'تسجيل الدخول إلى سيمبليريسك',
    'Username'=>'اسم المستخدم',
    'Password'=>'كلمة المرور',
    'ForgotYourPassword'=>'نسيت كلمة المرور الخاصة بك',
    'Login'=>'تسجيل الدخول',
    'Reset'=>'إعادة تعيين',
    'Send'=>'إرسال',
    'Update'=>'التحديث',
    'SendPasswordResetEmail'=>'إرسال بريد إلكتروني إعادة تعيين كلمة المرور',
    'PasswordReset'=>'إعادة تعيين كلمة المرور',
    'ResetToken'=>'إعادة تعيين رمز مميز',
    'RepeatPassword'=>'تكرار كلمة السر',
    'Submit'=>'إرسال',
    'ProfileDetails'=>'التفاصيل الشخصية',
    'LastLogin'=>'آخر تسجيل دخول',
    'ChangePassword'=>'تغيير كلمة المرور',
    'CurrentPassword'=>'كلمة المرور الحالية',
    'NewPassword'=>'كلمة المرور الجديدة',
    'ConfirmPassword'=>'تأكيد كلمة المرور',
    'ConfigureRiskFormula'=>'تكوين صيغة المخاطر',
    'ConfigureReviewSettings'=>'تكوين إعدادات الاستعراض',
    'AddAndRemoveValues'=>'إضافة وإزالة القيم',
    'UserManagement'=>'إدارة المستخدم',
    'RedefineNamingConventions'=>'إعادة تحديد اصطلاحات التسمية',
    'AuditTrail'=>'لمراجعة الحسابات',
    'Extras'=>'إضافات',
    'Announcements'=>'إعلانات',
    'About'=>'حول',
    'Impact'=>'أثر',
    'Likelihood'=>'احتمال',
    'MitigationEffort'=>'جهود التخفيف',
    'Change'=>'تغيير',
    'to'=>'إلى',
    'AddANewUser'=>'إضافة مستخدم جديد',
    'Type'=>'نوع',
    'FullName'=>'الاسم الكامل',
    'EmailAddress'=>'عنوان البريد الإلكتروني',
    'Teams'=>'الفرق',
    'ALL'=>'جميع',
    'NONE'=>'لا شيء',
    'UserResponsibilities'=>'مسؤوليات المستخدم',
    'AbleToSubmitNewRisks'=>'قادرة على تقديم إخطار جديدة',
    'AbleToModifyExistingRisks'=>'قادراً على تعديل المخاطر القائمة',
    'AbleToCloseRisks'=>'قادراً على إغلاق المخاطر',
    'AbleToPlanMitigations'=>'قادراً على خطة عوامل تخفيف مشاكل',
    'AbleToReviewLowRisks'=>'تتمكن من استعراض مخاطر منخفضة',
    'AbleToReviewMediumRisks'=>'تتمكن من استعراض المخاطر المتوسطة',
    'AbleToReviewHighRisks'=>'تتمكن من استعراض المخاطر العالية',
    'AllowAccessToConfigureMenu'=>'السماح بالوصول إلى "تكوين" قائمة',
    'MultiFactorAuthentication'=>'مصادقة متعددة العوامل',
    'None'=>'لا شيء',
    'Add'=>'إضافة',
    'ViewDetailsForUser'=>'عرض تفاصيل عن المستخدم',
    'DetailsForUser'=>'تفاصيل المستخدم',
    'Select'=>'حدد',
    'EnableAndDisableUsers'=>'تمكين وتعطيل المستخدمين',
    'EnableAndDisableUsersHelp'=>'استخدم هذه الميزة لتمكين أو تعطيل تسجيلات دخول المستخدم مع الحفاظ على مراجعة لأنشطة المستخدم',
    'DisableUser'=>'تعطيل المستخدم',
    'Disable'=>'قم بتعطيل',
    'EnableUser'=>'تمكين مستخدم',
    'Enable'=>'تمكين',
    'DeleteAnExistingUser'=>'حذف مستخدم موجود',
    'DeleteCurrentUser'=>'حذف المستخدم الحالي',
    'Delete'=>'حذف',
    'SendPasswordResetEmailForUser'=>'إرسال البريد الإلكتروني للمستخدم إعادة تعيين كلمة المرور',
    'Category'=>'الفئة',
    'AddNewCategoryNamed'=>'إضافة فئة جديدة تسمى',
    'DeleteCurrentCategoryNamed'=>'حذف الفئة الحالية المسماة',
    'Team'=>'فريق',
    'AddNewTeamNamed'=>'إضافة فريق جديد اسمه',
    'DeleteCurrentTeamNamed'=>'حذف الفريق الحالية المسماة',
    'Technology'=>'التكنولوجيا',
    'AddNewTechnologyNamed'=>'إضافة تقنية جديدة تسمى',
    'DeleteCurrentTechnologyNamed'=>'حذف التكنولوجيا الحالية المسماة',
    'SiteLocation'=>'مكان الموقع/',
    'AddNewSiteLocationNamed'=>'إضافة موقع/موقع جديد اسمه',
    'DeleteCurrentSiteLocationNamed'=>'حذف الموقع الحالي/موقع اسمه',
    'ControlRegulation'=>'لائحة مراقبة',
    'AddNewControlRegulationNamed'=>'إضافة لائحة التحكم الجديدة المسماة',
    'DeleteCurrentControlRegulationNamed'=>'حذف لائحة التحكم الحالية المسماة',
    'RiskPlanningStrategy'=>'تخطيط استراتيجية المخاطر',
    'AddNewRiskPlanningStrategyNamed'=>'إضافة تخطيط الاستراتيجية المسماة المخاطر الجديدة',
    'DeleteCurrentRiskPlanningStrategyNamed'=>'حذف تخطيط الاستراتيجية المسماة المخاطر الحالية',
    'CloseReason'=>'إغلاق السبب',
    'AddNewCloseReasonNamed'=>'إضافة السبب الوثيق الجديد المسمى',
    'DeleteCurrentCloseReasonNamed'=>'حذف السبب الوثيق الحالي اسمه',
    'IWantToReviewHighRiskEvery'=>'ترغب في مراجعة مخاطر عالية كل',
    'IWantToReviewMediumRiskEvery'=>'أريد لاستعراض المخاطر المتوسطة كل',
    'IWantToReviewLowRiskEvery'=>'ترغب في مراجعة مخاطر انخفاض كل',
    'days'=>'أيام',
    'MyClassicRiskFormulaIs'=>'صيغة المخاطر الكلاسيكية بلدي',
    'RISK'=>'المخاطر',
    'IConsiderHighRiskToBeAnythingGreaterThan'=>'واعتبر عالية المخاطر أن أي شيء أكبر من',
    'IConsiderMediumRiskToBeLessThanAboveButGreaterThan'=>'واعتبر مخاطرة متوسطة لتكون أقل من أعلاه، لكن أكبر من',
    'IConsiderlowRiskToBeLessThanAboveButGreaterThan'=>'واعتبر منخفضة المخاطر لتكون أقل من أعلاه، لكن أكبر من',
    'HighRisk'=>'مخاطر عالية',
    'MediumRisk'=>'مخاطرة متوسطة',
    'LowRisk'=>'مخاطر منخفضة',
    'Irrelevant'=>'غير ذي صلة',
    'SubmitYourRisks'=>'يقدم خطر',
    'PlanYourMitigations'=>'خطة التخفيف',
    'PerformManagementReviews'=>'إجراء مراجعات',
    'PrioritizeForProjectPlanning'=>'تخطيط المشاريع',
    'ReviewRisksRegularly'=>'أن يستعرض بانتظام',
    'DocumentANewRisk'=>'المستند مخاطر الجديدة',
    'UseThisFormHelp'=>'استخدم هذا النموذج لتوثيق خطرا جديداً للنظر في "عملية إدارة المخاطر"',
    'Subject'=>'هذا الموضوع',
    'ExternalReferenceId'=>'معرف مرجع خارجي',
    'ControlNumber'=>'رقم التحكم',
    'Owner'=>'مالك',
    'OwnersManager'=>'مدير مالك',
    'RiskScoringMethod'=>'أسلوب تسجيل المخاطر',
    'CurrentLikelihood'=>'احتمال الحالية',
    'CurrentImpact'=>'الأثر الحالي',
    'RiskAssessment'=>'تقييم المخاطر',
    'AdditionalNotes'=>'ملاحظات إضافية',
    'UNREVIEWED'=>'أونريفييويد',
    'PASTDUE'=>'الماضي الواجب',
    'ID'=>'معرف',
    'Status'=>'مركز',
    'Risk'=>'المخاطر',
    'DaysOpen'=>'فتح أيام',
    'CalculatedRisk'=>'مخاطرة محسوبة',
    'SubmittedBy'=>'مقدمة من',
    'NextReviewDate'=>'تاريخ الاستعراض التالي',
    'CVSSRiskScoring'=>'سجل المخاطر كفس',
    'DREADRiskScoring'=>'الرهبة وسجل المخاطر',
    'OWASPRiskScoring'=>'OWASP سجل المخاطر',
    'CustomRiskScoring'=>'سجل مخصص المخاطر',
    'MitigationPlanningHelp'=>'أدناه هي قائمة المخاطر المقدمة التي تتطلب التخطيط التخفيف',
    'ManagementReviewHelp'=>'أدناه هي قائمة المخاطر المقدمة التي تتطلب مراجعة الإدارة',
    'Submitted'=>'مقدم',
    'MitigationPlanned'=>'التخفيف من المخطط',
    'ManagementReview'=>'الاستعراض الإداري',
    'No'=>'لا',
    'Yes'=>'نعم',
    'AddAndRemoveProjects'=>'إضافة وإزالة المشاريع',
    'AddAndRemoveProjectsHelp'=>'إضافة وإزالة المشاريع من أجل ربط المخاطر متعددة معا لتحديد الأولويات',
    'AddNewProjectNamed'=>'إضافة مشروع جديد اسمه',
    'DeleteCurrentProjectNamed'=>'حذف المشروع الحالي اسمه',
    'AddUnassignedRisksToProjects'=>'إضافة غير المعينة مخاطر المشاريع',
    'AddUnassignedRisksToProjectsHelp'=>'سحب وإسقاط unassigned المخاطر ملحوظ للنظر فيها على النحو المشروع في المشروع المناسب التبويب',
    'PrioritizeProjects'=>'تحديد أولويات المشاريع',
    'PrioritizeProjectsHelp'=>'نقل المشاريع حول تغيير ترتيب الأولويات. بمجرد الانتهاء لا تنسى أن تضغط على زر "تحديث" لحفظ التغييرات',
    'SaveRisksToProjects'=>'حفظ مخاطر المشاريع',
    'RiskId'=>'خطر ID',
    'RiskActions'=>'الإجراءات',
    'ReopenRisk'=>'فتح خطر',
    'CloseRisk'=>'بالقرب من المخاطر',
    'EditRisk'=>'تحرير خطر',
    'PlanAMitigation'=>'خطة التخفيف',
    'PerformAReview'=>'إجراء استعراض',
    'AddAComment'=>'إضافة تعليق',
    'ShowRiskScoringDetails'=>'عرض تسجيل تفاصيل المخاطر',
    'HideRiskScoringDetails'=>'إخفاء المخاطر التهديف التفاصيل',
    'Details'=>'التفاصيل',
    'SubmissionDate'=>'تاريخ تقديم الطلب',
    'DateSubmitted'=>'تاريخ المقدمة',
    'EditDetails'=>'تحرير التفاصيل',
    'Mitigation'=>'التخفيف',
    'MitigationDate'=>'تاريخ تقديم التخفيف',
    'PlanningStrategy'=>'استراتيجية التخطيط',
    'CurrentSolution'=>'الحل الحالي',
    'SecurityRequirements'=>'المتطلبات الأمنية',
    'SecurityRecommendations'=>'التوصيات الأمنية',
    'EditMitigation'=>'تحرير التخفيف',
    'LastReview'=>'آخر استعراض',
    'ReviewDate'=>'مراجعة تاريخ',
    'Reviewer'=>'المراجع',
    'Review'=>'استعراض',
    'NextStep'=>'الخطوة التالية',
    'Comments'=>'تعليقات',
    'ViewAllReviews'=>'عرض جميع التعليقات',
    'ReviewHistory'=>'استعراض التاريخ',
    'Comment'=>'التعليق',
    'ClassicRiskScoring'=>'الكلاسيكية للمخاطر ، ',
    'RiskScoringActions'=>'خطر التهديف الإجراءات',
    'UpdateClassicScore'=>'تحديث نقاط الكلاسيكية',
    'ScoreBy'=>'درجة',
    'RISKClassicExp1'=>'الخطر = ( احتمال x تأثير + 2(أثر) )',
    'RISKClassicExp2'=>'الخطر = ( احتمال x تأثير + التأثير )',
    'RISKClassicExp3'=>'الخطر = ( احتمال x الأثر )',
    'RISKClassicExp4'=>'الخطر = ( احتمال x تأثير + احتمال )',
    'RISKClassicExp5'=>'الخطر = ( احتمال x تأثير + 2(احتمال) )',
    'Reason'=>'السبب',
    'CloseOutInformation'=>'إغلاق المعلومات',
    'SubmitManagementReview'=>'تقديم مراجعة الإدارة',
    'SubmitRiskMitigation'=>'تقديم التخفيف من المخاطر',
    'RiskDashboard'=>'لوحة خطر',
    'RiskTrend'=>'الاتجاه الخطر',
    'AllOpenRisksAssignedToMeByRiskLevel'=>'فتح جميع المخاطر المعينة إلى',
    'AllOpenRisksByRiskLevel'=>'فتح جميع المخاطر بمستوى المخاطر',
    'AllOpenRisksConsideredForProjectsByRiskLevel'=>'فتح جميع المخاطر التي نظرت فيها مستوى المخاطر للمشاريع',
    'AllOpenRisksAcceptedUntilNextReviewByRiskLevel'=>'فتح جميع المخاطر قبلته حتى الاستعراض المقبل مستوى المخاطرة',
    'AllOpenRisksToSubmitAsAProductionIssueByRiskLevel'=>'فتح جميع المخاطر أن يقدم كمسألة إنتاج بمستوى المخاطر',
    'AllOpenRisksByScoringMethod'=>'فتح جميع المخاطر بتسجيله الأسلوب',
    'AllClosedRisksByRiskLevel'=>'كافة المخاطر مغلقة بمستوى المخاطر',
    'SubmittedRisksByDate'=>'المخاطر المقدم بتاريخ',
    'MitigationsByDate'=>'عوامل تخفيف مشاكل حسب التاريخ',
    'ManagementReviewsByDate'=>'ملاحظات الإدارة حسب التاريخ',
    'ProjectsAndRisksAssigned'=>'المشاريع والمخاطر المعينة',
    'OpenRisks'=>'مخاطر مفتوحة',
    'ClosedRisks'=>'المخاطر المنتهية',
    'ReportMyOpenHelp'=>'ويبين هذا التقرير جميع المخاطر المفتوحة التي يوجد بها المستخدم الحالي كمالك أو أمر مدير المرتبطة بالمخاطرة بمستوى المخاطر',
    'ReportOpenHelp'=>'ويبين هذا التقرير فتح جميع المخاطر وأمرت بمستوى المخاطر',
    'ReportProjectsHelp'=>'ويبين هذا التقرير فتح جميع المخاطر النظر للمشاريع التي أمرت بمستوى المخاطر',
    'ReportNextReviewHelp'=>'ويبين هذا التقرير جميع المخاطر المقبولة حتى الاستعراض التالي أمرت بمستوى المخاطرة بفتح',
    'ReportProductionIssuesHelp'=>'ويبين هذا التقرير فتح جميع المخاطر المقدمة كقضايا الإنتاج وأمرت بمستوى المخاطر',
    'ReportRiskScoringHelp'=>'ويبين هذا التقرير تسجيل طرق جميع المخاطر والأخطار وسجل استخدام كل',
    'ReportClosedHelp'=>'ويبين هذا التقرير المخاطر كلها مغلقة وأمرت بمستوى المخاطر',
    'ReportSubmittedByDateHelp'=>'ويبين هذا التقرير جميع المخاطر التي أمرت بتاريخ التقديم',
    'ReportMitigationsByDateHelp'=>'هذا التقرير يظهر المخطط جميع عوامل تخفيف مشاكل يؤمر بالتخفيف من تاريخ',
    'ReportMgmtReviewsByDateHelp'=>'ويبين هذا التقرير جميع الاستعراضات الإدارية أمرت بمراجعة التاريخ',
    'ReportProjectsAndRisksHelp'=>'ويبين هذا التقرير جميع المشاريع والمخاطر المعينة لهم',
    'Language'=>'اللغة',
    'AllOpenRisksNeedingReview'=>'فتح جميع المخاطر التي تحتاج إلى مراجعة',
    'ReportReviewNeededHelp'=>'ويبين هذا التقرير فتح جميع المخاطر التي تحتاج إلى مراجعة الإدارة',
    'CustomValue'=>'قيمة مخصصة',
    'ClosedRisksByDate'=>'المخاطر المنتهية بتاريخ',
    'DateClosed'=>'تاريخ إغلاق',
    'ClosedBy'=>'مغلقة من قبل',
    'ReportClosedByDateHelp'=>'ويبين هذا التقرير جميع المخاطر التي يؤمر بتاريخ الإغلاق',
    'AllOpenRisksByTeam'=>'فتح جميع المخاطر بفريق',
    'ReportRiskTeamsHelp'=>'ويبين هذا التقرير جميع الفرق والمخاطر التي تم تعيينها لكل',
    'Unassigned'=>'غير المعينة',
    'AllOpenRisksByTechnology'=>'فتح جميع المخاطر بالتكنولوجيا',
    'ReportRiskTechnologiesHelp'=>'ويبين هذا التقرير جميع التكنولوجيات والمخاطر التي تم تعيينها لكل',
    'RiskLevel'=>'مستوى المخاطرة',
    'BasedOnTheCurrentRiskScore'=>'استناداً إلى "درجة المخاطر" الخاصة بك، سوف يكون تاريخ الاستعراض القادم الخاص بك ',
    'WouldYouLikeToUseADifferentDate'=>'هل تريد استخدام تاريخ آخر بدلاً من ذلك؟',
    'RisksOpenedAndClosedOverTime'=>'مخاطر فتح وإغلاق على مر الزمن',
    'AllRiskScoresAreAdjusted'=>'يتم ضبط جميع المخاطر العشرات لاحتوائه على مقياس من 0-10.',
    'DetermineProjectStatus'=>'تحديد الوضع الحالي للمشروع',
    'ProjectStatusHelp'=>'وضع مشاريع في دلاء استناداً إلى وضعهم الحالي.',
    'ActiveProjects'=>'المشاريع النشطة',
    'OnHoldProjects'=>'الاستمرار في المشاريع',
    'CompletedProjects'=>'المشاريع المنجزة',
    'CancelledProjects'=>'المشاريع الملغاة',
    'UpdateProjectStatuses'=>'تحديث حالة المشروع',
    'HighRiskReport'=>'تقرير عالية المخاطر',
    'TotalOpenRisks'=>'مجموع المخاطر مفتوحة',
    'TotalHighRisks'=>'مجموع المخاطر العالية',
    'HighRiskPercentage'=>'نسبة مخاطر عالية',
    'UpdateClassicScore'=>'تحديث نقاط الكلاسيكية',
    'CurrentLikelihood'=>'احتمال الحالية',
    'CurrentImpact'=>'الأثر الحالي',   
    'UpdateCVSSScore'=>'تحديث نقاط كفس',
    'BaseScoreMetrics'=>'قاعدة مقاييس النتيجة',
    'AttackVector'=>'موجه هجوم',
    'AttackComplexity'=>'تعقد الهجوم',
    'Authentication'=>'المصادقة',
    'ConfidentialityImpact'=>'أثر السرية',
    'IntegrityImpact'=>'أثر سلامة',
    'AvailabilityImpact'=>'أثر توافر',
    'TemporalScoreMetrics'=>'الزمانية نقاط المقاييس',
    'Exploitability'=>'إمكانية الاستغلال',
    'RemediationLevel'=>'مستوى المعالجة',
    'ReportConfidence'=>'تقرير الثقة',
    'EnvironmentalScoreMetrics'=>'البيئية نقاط المقاييس',
    'CollateralDamagePotential'=>'الأضرار الجانبية المحتملة',
    'TargetDistribution'=>'التوزيع المستهدف',
    'ConfidentialityRequirement'=>'شرط السرية',
    'IntegrityRequirement'=>'متطلبات السلامة',
    'AvailabilityRequirement'=>'شرط توافر',
    'UpdateDREADScore'=>'تحديث نقاط الرهبة',
    'DamagePotential'=>'الأضرار المحتملة',
    'Reproducibility'=>'إمكانية تكرار نتائج',
    'AffectedUsers'=>'المستخدمين المتأثرين',
    'Discoverability'=>'قابلية الاكتشاف',
    'UpdateOWASPScore'=>'تحديث نقاط OWASP',
    'ThreatAgentFactors'=>'العوامل عامل تهديد',
    'SkillLevel'=>'مستوى المهارة',
    'Motive'=>'الدافع',
    'Opportunity'=>'الفرصة',
    'Size'=>'الحجم',
    'VulnerabilityFactors'=>'عوامل الضعف',
    'EaseOfDiscovery'=>'سهولة اكتشاف',
    'EaseOfExploit'=>'سهولة استغلال',
    'Awareness'=>'الوعي',
    'IntrusionDetection'=>'كشف التسلل',
    'TechnicalImpact'=>'أثر التقنية',
    'LossOfConfidentiality'=>'فقدان السرية',
    'LossOfIntegrity'=>'فقدان سلامة',
    'LossOfAvailability'=>'خسارة لتوافر',
    'LossOfAccountability'=>'خسارة للمساءلة',
    'BusinessImpact'=>'تأثير الأعمال التجارية',
    'FinancialDamage'=>'الخسائر المالية',
    'ReputationDamage'=>'أضرار السمعة',
    'NonCompliance'=>'عدم الامتثال',
    'PrivacyViolation'=>'انتهاك الخصوصية',
    'UpdateCustomScore'=>'تحديث نقاط مخصصة',
    'ManuallyEnteredValue'=>'القيمة المدخلة يدوياً',
    'ScoreByClassic'=>'نقاط من كلاسيك',
    'ScoreByCVSS'=>'نقاط من كفس',
    'ScoreByDREAD'=>'نقاط بالرهبة',
    'ScoreByOWASP'=>'نقاط قبل OWASP',
    'ScoreByCustom'=>'نقاط حسب العرف',
    'BaseVector'=>'ناقل قاعدة',
    'TemporalVector'=>'ناقل الزماني',
    'EnvironmentalVector'=>'ناقلات الأمراض البيئية',
    'SupportingDocumentation'=>'الوثائق الداعمة',
    'Import'=>'استيراد',
    'Export'=>'تصدير',
    'ActivateTheImportExportExtra'=>'تنشيط الاستيراد والتصدير الإضافية',
    'PrintableView'=>'عرض قابلة للطباعة',
    'GroupBy'=>'تجميع حسب',
    'IncludedColumns'=>'إدراج أعمدة',
    'AllRisks'=>'كافة المخاطر',
    'DynamicRiskReport'=>'تقرير المخاطر الحيوية',
    'ObsoleteReports'=>'تقارير قديمة',
    'Project'=>'المشروع',
    'SortBy'=>'فرز حسب',
    'MonthSubmitted'=>'قدم في الشهر',
    'AssetManagement'=>'إدارة الأصول',
    'AutomatedDiscovery'=>'اكتشاف تلقائي',
    'BatchImport'=>'استيراد دفعة',
    'ManageAssets'=>'إدارة الأصول',
    'AssetValuation'=>'تقييم الأصول',
    'AllowAccessToAssetManagementMenu'=>'السماح بالوصول إلى القائمة "لإدارة الأصول"',
    'AutomatedDiscoveryHelp'=>'اكتشاف كافة عناوين IP يعيش في نطاق IP المدخلة.  عناوين IP يعيش ستضاف إلى قائمة الأصول.  صيغ مقبولة:',
    'IPRange'=>'نطاق IP',
    'Search'=>'البحث عن',
    'AddANewAsset'=>'إضافة ميزة جديدة',
    'DeleteAnExistingAsset'=>'حذف أصل موجود',
    'AssetName'=>'اسم الأصل',
    'IPAddress'=>'عنوان IP',
    'AssetWasAddedSuccessfully'=>'وأضاف الأصول بنجاح.',
    'AssetWasDeletedSuccessfully'=>'تم حذف الأصل بنجاح.',
    'ThereWasAProblemAddingTheAsset'=>'توجد مشكلة في إضافة الأصول.',
    'ThereWasAProblemDeletingTheAsset'=>'توجد مشكلة في حذف الأصل.',
    'ComingSoon'=>'قريباً',
    'ExportRisks'=>'مخاطر التصدير',
    'ExportMitigations'=>'عوامل تخفيف مشاكل التصدير',
    'ExportReviews'=>'تصدير ملاحظات',
    'ExportCombined'=>'تصدير جنبا إلى جنب',
    'MitigatedBy'=>'يخفف منها',
    'MitigationId'=>'معرف التخفيف',
    'ReviewId'=>'معرف مراجعة',
    'AffectedAssets'=>'الأصول المتضررة',
    'Activate'=>'تفعيل',
    'DeleteRisks'=>'حذف المخاطر',
    'DeletedRisksCannotBeRecovered'=>'حذف المخاطر لا يمكن استردادها',
    'RisksDeletedSuccessfully'=>'المخاطر(s) المحذوفة بنجاح',
    'ThereWasAProblemDeletingTheRisk'=>'كانت هناك مشكلة حذف المخاطر(s)',
    'Activated'=>'تنشيط',
    'IWantToReviewInsignificantRiskEvery'=>'أريد أن المراجعة لمخاطر كل',
    'Insignificant'=>'تافهة',
    'IConsiderVeryHighRiskToBeAnythingGreaterThan'=>'أنا أعتبر خطر كبير جدا أن يكون أي شيء أكبر من',
    'IConsiderHighRiskToBeLessThanAboveButGreaterThan'=>'أنا أعتبر عالية المخاطر إلى أقل من أعلاه ، ولكن أكبر من',
    'VeryHigh'=>'عالية جدا',
    'VeryHighRisk'=>'مخاطر عالية جدا',
    'IWantToReviewVeryHighRiskEvery'=> 'أريد أن استعراض مخاطر عالية جدا كل',
    'AbleToReviewVeryHighRisks'=>'قادرة على استعراض مخاطر عالية جدا',
    'AbleToReviewInsignificantRisks'=>'قادرة على استعراض المخاطر ضئيلة',
    'TotalVeryHighRisks'=>'إجمالي مخاطر عالية جدا',
    'VeryHighRiskPercentage'=>'مخاطر عالية جدا نسبة',
    'AllTeams'=>'جميع الفرق',
    'FileUploadSettings'=>'تحميل ملف الإعدادات',
    'AllowedFileTypes'=>'أنواع الملفات المسموح بها',
    'AddNewFileTypeOf'=>'إضافة ملف جديد من نوع',
    'DeleteCurrentFileTypeOf'=>'حذف الملف الحالي نوع من',
    'MaximumUploadFileSize'=>'الحد الأقصى لحجم ملف التحميل',
    'Bytes'=>'بايت',
    'CheckAll'=>'تحقق من كل',
    'CheckAllRiskMgmt'=>'تحقق من كل إدارة المخاطر',
    'CheckAllAssetMgmt'=>'تحقق من كل إدارة الأصول',
    'CheckAllConfigure'=>'تحقق من كل تكوين',
    'MitigationTeam'=>'التخفيف فريق',
    'ImportRisks'=>'مخاطر الاستيراد.',
    'ImportAssets'=>'استيراد الأصول',
    'AssetValue'=>'قيمة الأصول',
    'Register'=>'تسجيل',
    'RegisterSimpleRisk'=>'سجل SimpleRisk',
    'RegistrationText'=>'من خلال تسجيل SimpleRisk سيتم توفير معلومات الاتصال الخاصة بك بحيث يمكنك تحديث مع أحدث معلومات الإصدار الهامة الأمن الإخطارات. المعلومات الخاصة بك لن يتم بيعها إلى طرف ثالث. سجلت حالات أيضا لديها القدرة على أن يكون احتياطيا و ترقية مع نقرة زر واحدة.',
    'RegistrationInformation'=>'معلومات التسجيل',
    'Company'=>'الشركة',
    'JobTitle'=>'المسمى الوظيفي',
    'Phone'=>'الهاتف',
    'UpgradeSimpleRisk'=>'ترقية SimpleRisk',
    'UpgradeInstructions'=>'هذا القسم يستخدم ترقية اضافية. للتأكد من أن لديك أحدث إصدار ، حدد "تحديث" ، إعادة تسجيل و إعادة تحميل هذه الصفحة.',
    'NoUpgradeNeeded'=>'لا ترقية هو مطلوب في هذا الوقت.',
    'BackupDatabase'=>'النسخ الاحتياطي قاعدة البيانات',
    'UpgradeApplication'=>'ترقية التطبيق',
    'UpgradeDatabase'=>'ترقية قاعدة البيانات',
    'CustomExtras'=>'إضافات مخصص',
    'CustomExtrasText'=>'سيكون من الرائع إذا كان كل شيء, أليس كذلك ؟ نأمل الأساسية SimpleRisk منصة قادرة على خدمة جميع احتياجات إدارة المخاطر. ولكن إذا كنت تجد نفسك لا يزال يريد المزيد من الوظائف ، قمنا بتطوير سلسلة من "كومبارس" من شأنها أن تفعل ذلك تماما.',
    'Upgrade'=>'ترقية',
    'Install'=>'تثبيت',
    'Purchase'=>'شراء',
    'PasswordPolicy'=>'نهج كلمة المرور',
    'MinimumNumberOfCharacters'=>'الحد الأدنى لعدد الأحرف',
    'RequireAlphaCharacter'=>'تتطلب حرف ألفا',
    'RequireUpperCaseCharacter'=>'تتطلب حالة العلوي حرف',
    'RequireLowerCaseCharacter'=>'تتطلب حالة انخفاض حرف',
    'RequireNumericCharacter'=>'تتطلب حرف رقمي',
    'RequireSpecialCharacter'=>'تتطلب حرف خاص',
    'Enabled'=>'تمكين',
    'RiskPyramid'=>'الهرم الخطر',
    'RiskPyramidDescription'=>'الهرم المخاطر المذكورة أعلاه يساعد على إظهار توزيع المخاطر بين مختلف مستويات المخاطر.  هرم أعلى ثقيلة يمكن أن يكون علامة على أن المؤسسة الخاصة بك فأخذ الكثير من المخاطر.',
    'RiskAdvice'=>'نصيحة المخاطر',
    'AddDeleteAssets'=>'إضافة & حذف الأصول',
    'EditAssets'=>'تحرير الأصول',
    'AutomaticAssetValuation'=>'تقييم الأصول التلقائي',
    'ManualAssetValuation'=>'تقييم الأصول اليدوي',
    'MinimumValue'=>'قيمة الحد الأدنى',
    'MaximumValue'=>'الحد الأقصى للقيمة',
    'ValueRange'=>'نطاق القيمة',
    'DefaultAssetValuation'=>'تقييم الأصول الافتراضية',
    'Default'=>'افتراضي',
    'RisksAndAssets'=>'المخاطر والأصول',
    'Report'=>'التقرير',
    'RisksByAsset'=>'المخاطر حسب الأصول',
    'AssetsByRisk'=>'الأصول حسب المخاطر',
    'MaximumQuantitativeLoss'=>'الحد الأقصى للخسارة الكمية',
    'MitigationOwner'=>'مالك التخفيف',
    'MitigationCost'=>'التخفيف من التكاليف',
    'RiskColumns'=>'أعمدة المخاطر',
    'MitigationColumns'=>'التخفيف من الأعمدة',
    'ReviewColumns'=>'مراجعة الأعمدة',
    'ChangeStatus'=>'تغيير الحالة',
    'SetRiskStatusTo'=>'حالة تعيين المخاطر إلى',
    'AddNewStatusNamed'=>'إضافة حالة جديدة تسمى',
    'DeleteStatusNamed'=>'حذف حالة المسماة',
    'DefaultCurrencySymbol'=>'رمز العملة الافتراضي',
    'DefaultValues'=>'القيم الافتراضية',
    'RiskSource'=>'مصدر خطر',
    'AddNewSourceNamed'=>'إضافة مصدر جديد اسمه',
    'DeleteSourceNamed'=>'حذف المصدر المسماة',
    'CheckAllAssessments'=>'التحقق من جميع الأنصبة المقررة',
    'AllowAccessToAssessmentsMenu'=>'السماح بالوصول إلى القائمة "التقييمات"',
    'Assessments'=>'الأنصبة المقررة',
    'AvailableAssessments'=>'التقييمات المتاحة',
    'PendingRisks'=>'المخاطر المعلقة',
    'CreateAssessment'=>'إنشاء التقييم',
    'EditAssessment'=>'تحرير التقييم',
    'Overview'=>'نظرة عامة',
    'OpenVsClosed'=>'مباراة مفتوحة مغلقة',
    'MitigatedVsUnmitigated'=>'مقابل تخفيف تامة',
    'ReviewedVsUnreviewed'=>'استعرض مقابل أونريفييويد',
    'OpenedRisks'=>'مخاطر فتح',
    'MailSettings'=>'إعدادات البريد',
    'TransportAgent'=>'عامل النقل',
    'FromName'=>'من الاسم',
    'FromEmail'=>'من البريد الإلكتروني',
    'ReplyToName'=>'الرد باسم',
    'ReplyToEmail'=>'الرد على البريد الإلكتروني',
    'Host'=>'المضيف',
    'SMTPAuthentication'=>'المصادقة',
    'Encryption'=>'التشفير',
    'Port'=>'منفذ',
    'Next'=>'القادم',
    'NewAssessmentQuestion'=>'سؤال تقييم جديد',
    'Question'=>'سؤال',
    'RiskScore'=>'درجة المخاطر',
    'SubmitRisk'=>'يقدم خطر',
    'Answer'=>'جواب',
    'AddQuestion'=>'إضافة سؤال',
    'SaveAssessment'=>'حفظ التقييم',
    'SendAssessment'=>'إرسال تقييم',
    'DeleteAssessment'=>'حذف التقييم',
    'AssessmentName'=>'اسم التقييم',
    'SendTo'=>'إرسال إلى',
    'ActiveAssessments'=>'تقييمات النشطة',
    'SentTo'=>'إرسال إلى',
    'From'=>'من',
    'Key'=>'مفتاح',
    'GoToSSOLoginPage'=>'انتقل إلى صفحة تسجيل الدخول SSO',
    'APIKey'=>'API الرئيسية',
    'GenerateAPIKey'=>'إنشاء مفتاح API',
    'RotateAPIKey'=>'تدوير مفتاح API',
    'InvalidateAPIKey'=>'إبطال مفتاح API',
    'Deactivate'=>'إلغاء تنشيط',
    'ImportExportExtra'=>'استيراد وتصدير إضافية',
    'SaveDetails'=>'حفظ التفاصيل',
    'ClearForm'=>'مسح النموذج',
    'SaveMitigation'=>'حفظ التخفيف',
    'Cancel'=>'إلغاء الأمر',
    'SubmitReview'=>'يقدم مراجعة',
    'UnassignedRisks'=>'المخاطر غير المعينة',
    'DisableRegistrationNotice'=>'تعطيل تسجيل إشعار',
    'UserPolicy'=>'نهج المستخدم',
    'UseCaseSensitiveValidationOfUsername'=>'استخدام التحقق من صحة حساسة لحالة الأحرف في اسم المستخدم',
    'MitigationPlanning'=>'تاريخ التخفيف المخططة',
    'AssetDetails'=>'تفاصيل الأصول',
    'RiskList'=>'قائمة المخاطر',
    'Are you sure you want to close the risk? All changes will be lost!'=>'هل أنت متأكد من أنك تريد إغلاق المخاطر؟ سيتم فقدان كافة التغييرات!',
    'MinimumPasswordAge' => 'لعمر كلمة المرور الحد الأدنى',
    'MaximumPasswordAge' => 'لعمر كلمة المرور الحد الأقصى',
    'MaximumAttemptsLockout' => 'تأمين الحد الأقصى من محاولات',
    'MaximumAttemptsLockoutTime' => 'الوقت تأمين الحد الأقصى من محاولات',
    'attempts' => 'محاولات',
    'minutes' => 'دقيقة',
    'AccountLockedOut' => 'الحساب مؤمناً',
    'AccountLockoutPolicy' => 'نهج تأمين الحساب',
    'ImportExportIsDeactivated' => 'يتم إلغاء تنشيط الاستيراد والتصدير',
    'PurchaseTheExtra' => 'شراء إضافية',
    'ExpandAll' => 'توسيع الكل',
    'ConditionMessageForMinChar' => 'يجب أن تحتوي كلمة المرور الحد أدنى الأحرف $min_chars.',
    'ConditionMessageForAlpha' => 'يجب أن تحتوي كلمة المرور على حرف ألفا.',
    'ConditionMessageForUppercase' => 'يجب أن تحتوي كلمة المرور على حرف أحرف كبيرة.',
    'ConditionMessageForLowercase' => 'يجب أن تحتوي كلمة المرور على أحرف صغيرة.',
    'ConditionMessageForDigit' => 'يجب أن تحتوي كلمة المرور أرقام.',
    'ConditionMessageForSpecialchar' => 'يجب أن تحتوي كلمة المرور على حرف خاص.',
    'ConditionMessageForMinPasswordAge' => 'يمكن تحديث كلمة المرور من آخر تحديث الوقت الحد أدنى $min_password_age بعد ذلك بأيام.',
    'TrustedDomains' => 'المجالات الموثوق بها',
    'SimpleRiskColumnMapping' => 'تعيين العمود سيمبليريسك',
    'Mapping' => 'رسم الخرائط',
    'Optional' => 'اختياري',
    'SaveMappingAs' => 'حفظ رسم الخرائط',
    'EncryptionLevel' => 'مستوى التشفير',
    'Level' => 'مستوى',
    'Description' => 'الوصف',
    'ShowRiskScoreOverTime' => 'إظهار نقاط المخاطر مع مرور الوقت',
    'HideRiskScoreOverTime' => 'إخفاء نقاط المخاطر مع مرور الوقت',
    'ReviewRegularlyHelp' => 'أدناه هي القائمة من كافة المخاطر حسب أونريفييويد والواجب الماضية والقادمة استعراض التاريخ',
    'RiskScoringHistory' => 'تسجيل التاريخ المخاطر',
    'RiskAddPermissionMessage' => 'ليس لديك الإذن لإرسال إخطار جديدة.  لن يتم تسجيل أي المخاطر التي حاولت أن تقدم.  الرجاء الاتصال بمسؤول إذا كنت تشعر بأنك وصلت إلى هذه الرسالة عن طريق الخطأ.',
    'SubjectRiskCannotBeEmpty' => 'هذا الموضوع من خطر لا يمكن أن يكون فارغاً',
    'InvalidRiskID' => 'معرف غير صالح في خطر',
    'Success' => 'نجاح',
    'RiskUpdatePermissionMessage' => 'ليس لديك الإذن لتعديل مخاطر.  لن يتم تسجيل أي المخاطر التي تحاول تعديلها.  الرجاء الاتصال بمسؤول إذا كنت تشعر بأنك وصلت إلى هذه الرسالة عن طريق الخطأ.',
    'RiskReviewPermission' => 'ليس لديك الإذن لاستعراض $risk_level مستوى المخاطر.  لن يتم تسجيل أي ملاحظات التي حاولت أن تقدم.  الرجاء الاتصال بمسؤول إذا كنت تشعر بأنك وصلت إلى هذه الرسالة عن طريق الخطأ.',
    'DateAndTime' => 'التاريخ والوقت',
    'mCryptWarning' => 'ملحق "mcrypt" يحتاج إلى تثبيت "تشفير إضافية" للعمل بشكل صحيح.  الرجاء تثبيت على الاستمرار.',
    'APIInCompatibleWithEncryptionLevel' => 'API غير متوافق مع مستوى التشفير المستخدم "تشفير قاعدة البيانات الإضافية".',
    'UnauthenticatedAccessInAPI' => 'الوصول غير المصادق.  الرجاء تسجيل الدخول أو توفير مفتاح استخدام API سيمبليريسك.',
    'ResetPasswordMessageInUserLevelEncryption' => 'يمكنك عدم إعادة تعيين كلمة المرور لهذا المستخدم في تشفير مستوى المستخدم. الرجاء الاتصال بالمسؤول.',
    'YouNeedToSpecifyAnIdParameter' => 'تحتاج إلى تحديد معلمة معرف.',
    'NoMitigation' => 'هناك لا تخفيف المحدد.',
    'NoReview' => 'لا يوجد محدد استعراض.',
    'MysqldumpPathWasSavedSuccessfully' => 'تم حفظ مسار Mysqldump بنجاح.',
    'UnavailableMysqldumpService' => 'لا توجد افايابلي \'mysqldump\' خدمة على الملقم. الرجاء تعيين مسار خدمة mysqldump المطلق.',
    'AllOpenRisksByTeamByLevel' => 'فتح جميع المخاطر بفريق بمستوى المخاطر',
    'Unknown' => 'المجهول',
    'AllOwners' =>'كافة المخاطر',
    'AllOwnersManagers' => 'مديري كل مالك',
    'AddNewReviewNamed' => 'إضافة استعراض جديد اسمه',
    'DeleteCurrentReviewNamed' => 'حذف المراجعة الحالية المسماة',
    'AddNewNextstepNamed' => 'إضافة الخطوة التالية الجديدة',
    'DeleteCurrentNextstepNamed' => 'حذف الخطوة الحالية المسماة',
    'Settings' => 'إعدادات',
    'EnablePopupWindowsForTextBoxes' => 'تمكين الإطارات المنبثقة لمربعات النص',
    'PasswordNoLongerUse' => 'هذه كلمة المرور الجديدة غير محدودة، حيث يمكنك لم يعد استخدام.  الرجاء محاولة كلمة مرور أخرى',
    'RememberTheLast' => 'ريميمبيرثيلاست',
    'Passwords' => 'كلمات المرور',
    'NoOwner' => 'لا مالك',
    'NoOwnersManager' => 'لا يوجد مدير أصحاب',
    'RiskAverageOverTime' => 'متوسط المخاطر مع مرور الوقت',
    'AverageRiskScore' => 'متوسط درجة المخاطر',
    'Year' => 'السنة',
    'Month' => 'في الشهر',
    'Day' => 'اليوم',
    'FilterByAffectedAsset' => 'تصفية حسب الأصول المتضررة',
    'RisksOpened' => 'مخاطر فتح',
    'RisksClosed' => 'مخاطر إغلاق',
    'HealthCheck' => 'التحقق من الصحة',
    'RequirePasswordChangeOnLogin' => 'يتطلب تغيير كلمة المرور في تسجيل الدخول',
    'PasswordChangeRequired' => 'كنت بحاجة لتغيير كلمة المرور قبل تسجيل الدخول.',
    'LikelihoodImpact' => 'احتمال والأثر',
    'MitigationPercent' => 'التخفيف من حدتها بالمئة',
    'MitigationPermissionMessage' => 'ليس لديك الإذن لخطة عوامل تقليل الأمان الموجودة.  لن يتم تسجيل أي محاولة تقديم عوامل تقليل الأمان الموجودة.  الرجاء الاتصال بمسؤول إذا كنت تشعر بأنك وصلت إلى هذه الرسالة عن طريق الخطأ.',
    'ResetCustomDisplaySettings' => 'إعادة تعيين إعدادات العرض المخصصة',
    'CustomResetSuccessMessage' => 'تم إعادة تعيين إعدادات العرض المخصصة الخاصة بك بنجاح',
    'DefaultRiskScore' => 'درجة المخاطر الافتراضية',
    'AdditionalStakeholders' => 'إضافية من أصحاب المصلحة',
    'AllSkateholders' => 'جميع أصحاب المصلحة',
    'RiskIdDoesNotExist' => 'معرف الخطر غير موجود',
    'RiskTeamPermission' => 'أنت لست عضوا في فريق ينتمي هذا الخطر إلى',
    '' => '',
);

?>
